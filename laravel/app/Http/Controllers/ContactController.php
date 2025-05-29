<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function store(ContactRequest $request)
    {
        $data = $request->validated();

        $this->service->contact($data);

        return response()->json(['success' => true]);
    }
}
