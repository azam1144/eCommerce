<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use App\Services\PaymentProcessService;
use App\Jobs\OrderJob;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{

    /**
     * @var PaymentProcessService
     */
    protected $repositoryService;

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */
    public function __construct(ProductRepository $repository, ProductValidator $validator, PaymentProcessService $repositoryService)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->repositoryService  = $repositoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $products = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'products' => $products,
            ]);
        }

        return view('eCommerce.products.womenFashionProducts')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $product = $this->repository->create($request->all());

            $response = [
                'message' => 'Product created.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        $product = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Product updated.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Product deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Product deleted.');
    }



    /**
     * proceed checkout process.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout($product_id)
    {
        $product = $this->repository->find($product_id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('eCommerce.products.checkout')->with('product', $product);
    }

    /**
     * Proceed Payments.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $payment = $this->repositoryService->performPayment($request);
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $payment,
            ]);
        }

        $orderData = ['id_email' => $request->id_email, 'id_first_name' => $request->id_first_name, 'id_last_name' => $request->id_last_name,
            'id_phone' => $request->id_phone, 'id_address_line_1' => $request->id_address_line_1, 'id_city' => $request->id_city,
            'id_state' => $request->id_state, 'id_postalcode' => $request->id_postalcode, 'name_on_card' => $request->name_on_card,
            'card_number' => $request->card_number, 'card_exp_month' => $request->card_exp_month, 'card_exp_year' => $request->card_exp_year,
            'card_cvc' => $request->card_cvc, 'planPrice' => $request->planPrice, 'interest' => $request->interest,
            'plan' => $request->plan,  'product_id' => $request->product_id];

        OrderJob::dispatch($orderData, $payment);
        return response()->json($payment);
    }
}
