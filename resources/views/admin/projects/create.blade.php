@extends('layouts.app')

@section('title', 'Character')

@section('content')
<section class="mt-5 pt-5">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Add Project to Database!</h1>
    </div>
</section>


<section class="mb-5 py-5">
    <div class="bg-dark text-light container py-4">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert your name's project"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="date_of_creation" class="form-label fw-bold">Date of Creation</label>
                <input type="date" class="form-control" id="date_of_creation" name="date_of_creation" placeholder="Insert date"
                    value="{{ old('date_of_creation') }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label fw-bold">Type</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Public or Private"
                    value="{{ old('type') }}">
            </div>
            <div class="mb-3">
                <label for="contributors" class="form-label fw-bold">Contributors</label>
                <input type="number" class="form-control" id="contributors" name="contributors" placeholder="Insert value"
                    value="{{ old('contributors') }}">
            </div>
            <div class="mb-3">
                <label for="contributors_link" class="form-label fw-bold">Contributors Git Hub Links (Insert Contributors Git Hub Links, if any)</label>
                <textarea class="form-control" id="contributors_link" name="contributors_link"
                    placeholder="https://github.com/Contributor, https://github.com/Contributor, https://github.com/Contributor">{{old('contributors_link')}}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Describe your project">{{old('description')}}
                </textarea>
            </div>

            <button class="btn btn-primary">Create</button>
        </form>
    </div>

    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
@endsection