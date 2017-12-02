@extends('layout')

@section('css')
    <link href={{asset("css/jquery.ui.autocomplete.css")}} rel="stylesheet">
    @stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edition d'un auteur</div>

                    <div class="panel-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif
                        <form method="POST" action="{{ route('test.update', $author->id )}} " accept-charset="UTF-8" class="form-horizontal panel">

                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group ">
                                <label for="name" class="col-md-4 control-label">Nom :</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', $author->name) }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="country" class="col-md-4 control-label">Pays :</label>
                                <div class="col-md-6">
                                    <select name="country" id="country" class="form-control">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">Ville :</label>
                                <div class="col-md-6">
                                    <select name="city" id="city" class="form-control"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit"  id="tyu">
                                        Envoyer
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src={{asset("js/jquery-ui.min.js")}}></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#name').bind(function () {

            });

            src = "{{ url('search') }}";

            $('#name').autocomplete({
                source : src,
                minlenght:3,
                autoFocus:true
            });


            // Récupération des id pour pays et ville
            var country_id = $('#country').val();
            var city_id = $('#city').val();

            // Sélection du pays
            $('#country').val(country_id).prop('selected', true);
            // Synchronisation des villes
            cityUpdate(country_id);

            // Changement de pays
            $('#country').on('change', function (e) {
                var country_id = e.target.value;
                city_id = false;
                cityUpdate(country_id);
            });

            // Requête Ajax pour les villes
            function cityUpdate(countryId) {
                $.get('{{ url('cities') }}/' + countryId + "'", function (data) {
                    $('#city').empty();
                    $.each(data, function (index, cities) {
                        $('#city').append($('<option>', {
                            value: cities.id,
                            text: cities.name
                        }));
                    });
                    if (city_id) {
                        $('#city').val(city_id).prop('selected', true);
                    }
                });
            }
        });


    </script>

@endsection

