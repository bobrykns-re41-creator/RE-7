<?php
namespace App\Http\Controllers;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\VinylContactRequest;
class SiteController extends Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }

    public function entry()
    {
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request)
    {
        return view(
            'site.entry-confirm',
            $request->validated()
        );
    }

    public function contact()
    {
        $promoText = "Шукаєте конкретний альбом? Залиште заявку, і ми знайдемо його!";

        return view('site.contact', ['promoText' => $promoText]);
    }

    public function contactSubmit(VinylContactRequest $request)
    {
        $validatedData = $request->validated();

        return view('site.contact-confirm', $validatedData);
    }
}
