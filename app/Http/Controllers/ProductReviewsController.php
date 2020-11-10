<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductReviewCreateRequest;
use App\Http\Requests\ProductReviewUpdateRequest;
use App\Repositories\ProductReviewRepository;
use App\Validators\ProductReviewValidator;

/**
 * Class ProductReviewsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductReviewsController extends Controller
{
    /**
     * @var ProductReviewRepository
     */
    protected $repository;

    /**
     * @var ProductReviewValidator
     */
    protected $validator;

    /**
     * ProductReviewsController constructor.
     *
     * @param ProductReviewRepository $repository
     * @param ProductReviewValidator $validator
     */
    public function __construct(ProductReviewRepository $repository, ProductReviewValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $productReviews = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productReviews,
            ]);
        }

        return view('productReviews.index', compact('productReviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductReviewCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductReviewCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $productReview = $this->repository->create($request->all());

            $response = [
                'message' => 'ProductReview created.',
                'data'    => $productReview->toArray(),
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
        $productReview = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productReview,
            ]);
        }

        return view('productReviews.show', compact('productReview'));
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
        $productReview = $this->repository->find($id);

        return view('productReviews.edit', compact('productReview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductReviewUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductReviewUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $productReview = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProductReview updated.',
                'data'    => $productReview->toArray(),
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
                'message' => 'ProductReview deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProductReview deleted.');
    }
}
