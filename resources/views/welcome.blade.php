@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
        @endif
    </div>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">KCSIt / Clever test</h1>
                <p>I had some issues with my docker installation, so I lost one entire day.</p>

                <p>So, I wrote below some points.</p>
                <p>Improvement points:</p>
                <ol>
                    <li>I didn't make tests, because I didn't with Laravel 7 ever.</li>
                    <li>I did as Laravel way of life, but I don't like with some validations and other model things inner a Controller, because controllers should be work just to requests. To solve this issue, I'll implement Repository/Services pattern.</li>
                </ol>

                <p>My best regards!</p>

                <p>Note: I won't consider any new commit in the test, but I felt an obligation to correct the docker script. Besides, I realized a missed ".env" file in my first commit, and two minor errors (both in the blade template files).</p>
        </div>
    </div>

    <footer class="container">
        <p>&copy; Gilmar Brito - KPCSIt - 2020</p>
    </footer>
    
@endsection
