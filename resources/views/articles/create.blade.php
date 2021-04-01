@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css">
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class='container'>
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

        <form method="POST" action="/articles">
            <!-- Without the csrf, it will turn to page 419 -->
            @csrf

            <div class="field">
                <label for="" class="label" for="title"></label>

                <div class="control">
                    <input type="text" class="input" name="title" id="title">
                </div>
            </div>

            <div class="field">
                <label for="" class="label" for="exerpt"></label>

                <div class="control">
                    <textarea class="textarea" name="exerpt" id="exerpt" ></textarea>
                </div>
            </div>

            
            <div class="field">
                <label for="" class="label" for="body"></label>

                <div class="control">
                    <textarea class="textarea" name="body" id="body" ></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection