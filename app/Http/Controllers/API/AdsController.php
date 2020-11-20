<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\AdsResource;
use App\Http\Resources\UserResource;
use App\Models\Ads;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdsController extends Controller
{

    /**
     * Get Ads list.
     * @return JsonResponse
     */
    public function index()
    {
        $ads = auth()->user()->ads()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'user_name' => $item->user->name,
                'user_phone' => $item->user->phone,
                'price' => $item->price . " AED",
                'posted_at' => $item->created_at->toDateTimeString(),
            ];
        });
        return $this->ok($ads);
    }

    /**
     * Get Ads details.
     * @param Ads $ads
     * @return JsonResponse
     */
    public function show(Ads $ads)
    {
        return $this->ok(new AdsResource($ads));
    }

    /**
     * User login.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required',
            'photos' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'price' => 'required|integer',
            'kilometers' => 'required|integer',
            'condition' => 'required|in:'.implode(Ads::getConditions(), ','),
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->validation($validator->errors()->first(), $validator->errors());
        }

        $user = auth()->user();
        $ads = $user->ads()->create($validator->validated());
        if($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->storePublicly('public/ads');
            }
        }
        $ads->photos = $photos;
        $ads->save();
        return $this->success("Ads created successfully.", new AdsResource($ads));
    }

}
