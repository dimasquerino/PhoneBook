<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $contact;
    protected $user;

    public function __construct(Contact $contact, User $user)
    {
        $this->contact = $contact;
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $contacts = $this->contact->where('name','LIKE', "%{$request->search}%")->where('user_id', '=', Auth::user()->id)->orderBy('name', 'asc')->paginate(5);

        $search = $request->search;

        $bookIsNull = false;

        if (count($contacts) == 0){
            if ($search != ''){
                $bookIsNull = "Sua pesquisa por: {$search}, não retornou resultado!";
                return view('contacts.index', compact('bookIsNull', 'contacts', 'search'));
            }
            $bookIsNull = 'Sua agenda está vazia. Adicione o seu primeiro contato!';
            return view('contacts.index', compact('bookIsNull', 'contacts', 'search'));
        }
        return view('contacts.index', compact('contacts', 'bookIsNull', 'search'));
    }

    public function show($id)
    {
        $contact = $this->contact->find($id);

        if (!$contact = $this->contact->find($id) || !$contact['user_id'] == Auth::user()->id){
            return redirect(route('contacts.index'));
        }

        $contact = $this->contact->find($id);

        return view('contacts.show', compact('contact'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {;
        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'telephone' => $request->telephone,
            'observation' => $request->observation,
        ];
        if ($request->avatar){
            $data['avatar'] = $request->avatar->store('contacts');
        }

        $lastContactCreate = $this->contact->create($data);

        return redirect(route('contacts.show', $lastContactCreate->id))->with('msg', "Contato {$lastContactCreate->name} cadastrato com sucesso.");
    }

    public function edit($id)
    {
        $contact = $this->contact->find($id);

        if (!$contact = $this->contact->find($id) || !$contact['user_id'] == Auth::user()->id){
            return redirect(route('contacts.index'));
        }
        $contact = $this->contact->find($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(StoreContactRequest $request, $id)
    {
        $contact = $this->contact->find($id);
        if (!$contact['id'] == $id || !$contact['user_id'] == Auth::user()->id){
            return redirect(route('contacts.index'));
        }
        $data = $request->only('name', 'telephone', 'observation');
        if ($request->avatar){
            if ($contact->avatar && Storage::exists($contact->avatar)){
                Storage::delete($contact->avatar);
            }

            $data['avatar'] = $request->avatar->store('contacts');
        }

        $contact->update($data);
        return redirect(route('contacts.index'))->with('msg', "Contato {$contact->name} editado com sucesso.");
    }

    public function destroy($id)
    {
        $contact = $this->contact->find($id);
        if (!$contact['id'] == $id || !$contact['user_id'] == Auth::user()->id){
            return redirect(route('contacts.index'));
        }
        if ($contact->avatar && Storage::exists($contact->avatar)){
            Storage::delete($contact->avatar);
        }
        $contact->delete();
        return redirect(route('contacts.index'))->with('msg', "Contato {$contact->name} deletado com sucesso.");
    }
}
