@extends('layouts.app')
@section('content')


    <div class="container-fluid app-body app-home">

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{url('search-posts')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-3">
                            <input type="text" name="search-text" required>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="search-date" required>
                        </div>
                        <div class="col-md-3">
                            <select name="searchGroup" required>
                                    <option value="all">
                                        All Groups
                                    </option>
                                @foreach($groupTypes as $types)
                                    <option value="{{$types->type}}">
                                        {{$types->type}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th scope="col">Group Name</th>
                        <th scope="col">Group Type</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Post Text</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bufferPosting as $posting)
                    <tr>

                        <td>{{$posting->groupInfo->name}}</td>
                        <td>{{$posting->groupInfo->type}}</td>
                        <td><img style="height:65px !important" src="{{$posting->accountInfo->avatar}}"
                                 class="center-block img-circle img-responsive"></td>
                        <td>{{$posting->post_text}}</td>
                        <td>{{$posting->created_at->format('M D Y, h:mm:ss a')}}</td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$bufferPosting->links()}}

            </div>
        </div>
    </div>
@endsection
