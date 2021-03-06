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
                <label for="" class="label" for="title">Title</label>

                <div class="control">
                    <!-- <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" id="title">
                    @if ($errors->has('title'))
                    <p class="help is-danger">{{$errors->first('title')}}</p>
                    @endif -->

                    <input 
                    type="text" 
                    class="input @error('title') is-danger @enderror" 
                    name="title" 
                    id="title"
                    value="{{ old('title') }}"
                    >

                    @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                    @enderror
                    
                </div>
            </div>

            <div class="field">
                <label for="" class="label" for="exerpt">Exerpt</label>

                <div class="control">
                    <textarea 
                    class="textarea @error('exerpt') is-danger @enderror" 
                    name="exerpt" 
                    id="exerpt" 
                    >{{ old('exerpt') }}</textarea>
                    @error('exerpt')
                        <p class="help is-danger">{{$errors->first('exerpt')}}</p>
                    @enderror
                </div>
            </div>

            
            <div class="field">
                <label for="" class="label" for="body">Body</label>

                <div class="control">
                    <textarea 
                    class="textarea @error('body') is-danger @enderror" 
                    name="body" 
                    id="body" 
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="" class="label" for="tags">Tags</label>

                <div class="select is-multiple control">
                    <select 
                    name="tags[]"
                    multiple 
                    >
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                        @endforeach
                    </select>

                    @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
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