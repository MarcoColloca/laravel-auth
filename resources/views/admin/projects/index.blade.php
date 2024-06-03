@extends('layouts.app')

@section('content')
    
    <section class="mb-5 py-5 bg-purple">
        <div class="bg-light container py-4 projects-cotnainer">

            <h1 class="my-4 text-center"> My Projects</h1>
            <a class="btn btn-dark mb-5" href="{{route('admin.projects.create')}}">Aggiungi Progetto</a>

            <table class="table table-dark table-stripped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date of Creation</th>
                        <th scope="col">Type of Project</th>
                        <th scope="col">Contributors</th>
                        <th scope="col">More Info</th>
                        <th scope="col">Modify</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)                
                        <tr>
                            <td>{{$project->name}}</td>
                            <td>{{$project->date_of_creation}}</td>
                            <td>{{$project->is_public === 0 ? 'Public' : 'Private'}}</td>
                            <td>{{$project->contributors}}</td>
                            <td><a class="text-success" href="">Show Info</a></td>
                            <td><a class="text-primary" href="">Edit</a></td>
                            <td><a class="text-danger text-center" href="">X</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    
@endsection