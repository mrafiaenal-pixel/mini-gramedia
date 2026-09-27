<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class SubscriptionPackageController extends Controller
{
    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $subscriptionPackages = SubscriptionPackage::all();
        return view('admin.subscription-packages.index', compact('subscriptionPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subscription-packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'color' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        SubscriptionPackage::create($validated);

        return redirect()
            ->route('admin.subscription-packages.index')
            ->with('success', 'Paket langganan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($id);
        return view('subscription-packages.show', compact('subscriptionPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($id);
        return view('admin.subscription-packages.edit', compact('subscriptionPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'color' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $subscriptionPackage->update($validated);

        return redirect()
            ->route('admin.subscription-packages.index')
            ->with('success', 'Paket langganan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($id);
        $subscriptionPackage->delete();

        return redirect()
            ->route('admin.subscription-packages.index')
            ->with('success', 'Paket langganan berhasil dihapus');
    }

    /**
     * Display a listing of subscription packages for users.
     */
    public function userIndex()
    {
        $subscriptionPackages = SubscriptionPackage::all();
        return view('subscription-packages.index', compact('subscriptionPackages'));
    }
}
