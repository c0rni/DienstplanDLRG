@extends('_layouts.application')

@section('head')
    <!-- Bootstrap Select Css -->
    <link href="/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{$user->first_name}} {{$user->name}}
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            @include('user._form')
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            @include('user.education')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->

        @if(Auth::id() == $user->id)
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Kalender abonnieren</h2>
                </div>
                <div class="body">
                    <p>Kopiere diese URL in deine Kalender-App (Apple Kalender, Google Calendar, Outlook …), um deine Dienste und Übungen zu abonnieren.</p>
                    <p class="text-muted" style="font-size: 0.9em;">
                        Enthält alle Dienste und Übungen, zu denen du eingetragen bist. Bewerbungen, bei denen du noch nicht eingeteilt wurdest, erscheinen mit dem Zusatz <em>(Beworben)</em> im Titel.
                    </p>
                    <div class="input-group">
                        <input type="text" id="ical-url" class="form-control" readonly
                               value="{{ route('ical.feed', $user->ical_token) }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default waves-effect" type="button" onclick="copyIcalUrl()">
                                <i class="material-icons">content_copy</i> Kopieren
                            </button>
                        </span>
                    </div>
                    <span id="ical-copy-feedback" style="display:none; color: green; font-size: 0.85em; margin-top: 4px;">
                        <i class="material-icons" style="font-size:1em; vertical-align: middle;">check</i> URL kopiert!
                    </span>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection


@section('post_body')

    <script>
        $( document ).ready(function() {

        });

        function copyIcalUrl() {
            var url = document.getElementById('ical-url').value;
            navigator.clipboard.writeText(url).then(function() {
                var feedback = document.getElementById('ical-copy-feedback');
                feedback.style.display = 'inline';
                setTimeout(function() { feedback.style.display = 'none'; }, 2500);
            });
        }
    </script>
@endsection
