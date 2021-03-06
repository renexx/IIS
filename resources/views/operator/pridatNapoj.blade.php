@extends('headerOperator')

@section('operatorContent')
@if (!Auth::guard("operatori")->check() && !Auth::guard("administrator")->check())
<div>
    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a class="btn">Nie ste operátor.</a>
        </div>
    </div>
</div>
@else
    <div class="novaP">

        <div class="col-auto order-md-1">
            @if ($message = Session::get('success'))
               <div class="alert alert-success alert-block">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>{{ $message }}</strong>
               </div>
            @endif

            <h4 class="mb-3">Nová položka</h4>

            <form action="{{route('napoj.store')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_stala_ponuka" value="{{$prevadzka_id}}">
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <label for="popis">Názov</label>
                        <input type="text" name="popis" class="form-control"  placeholder="" value="{{old('popis')}}" required="" autofocus>
                        <div class="invalid-feedback">
                            Vyplňte názov.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="objem">Objem v mililitroch</label>
                        <input type="text" pattern="[0-9]+" name="objem" class="form-control" placeholder="" value="{{old('objem')}}" required="">
                        <div class="invalid-feedback">
                            Vyplňte objem.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cena">Cena v czk</label>
                        <input type="text" pattern="[0-9]+" name="cena" class="form-control" placeholder="" value="{{old('cena')}}" required="">
                        <div class="invalid-feedback">
                            Vyplňte cenu.
                        </div>
                    </div>
                </div>


                <label for="typ">Typ</label>
                <div class="kateg" name="typ">
                    <input type="radio" name="typ" value="normal" checked> Normal<br>
                    <input type="radio" name="typ" value="vegan"> Vegan<br>
                    <input type="radio" name="typ" value="vegetarian"> Vegetarian<br>
                    <input type="radio" name="typ" value="bezlepok"> Bezlepkové<br>
                    <input type="radio" name="typ" value="raw"> Raw<br>
                    <input type="radio" name="typ" value="fit"> Fit<br>
                </div>

                <label for="kategoria">Kategória</label>
                <div class="kateg" name="kategoria">
                    <input type="radio" name="kategoria" value="vino" checked> Víno<br>
                    <input type="radio" name="kategoria" value="pivo"> Pivo<br>
                    <input type="radio" name="kategoria" value="kava"> Káva<br>
                    <input type="radio" name="kategoria" value="caj"> Čaj<br>
                    <input type="radio" name="kategoria" value="drink"> Miešaný drink<br>
                    <input type="radio" name="kategoria" value="limonady"> Limonády<br>
                </div>

                    <div class="form-group">
                        <label name="alko">Alkoholické</label><br>
                        <input type="radio" name="alko" value="ano" checked> Áno<br>
                        <input type="radio" name="alko" value="nie"> Nie<br>
                    </div>

                    <div class="form-group">
                        <label name="dostupnost">Dostupnosť</label><br>
                        <input type="radio" name="dostupnost" value="ano" checked> Áno<br>
                        <input type="radio" name="dostupnost" value="nie"> Nie<br>
                    </div>

                    <div class="mb-3">
                        <label for="obrazok">Obrázok</label>
                        <input id="obrazok" type="file" class="btn @error('err') is-invalid @enderror" name="obrazok" value="{{ old('obrazok') }}" required autocomplete="obrazok">
                        @error('err')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Uložiť</button>
            </form>
        </div>
    </div>
@endif
@stop
