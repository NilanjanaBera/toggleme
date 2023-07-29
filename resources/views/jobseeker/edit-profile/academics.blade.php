@extends("layouts.master")

@section("content")
<div class="banner-2">
    <div class="container">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner-2 text-center">
                <h1 class="">Edit Profile</h1>
                <div class="banner-links">
                    <a href="index.php">Home</a>
                    <a href="#">/</a>
                    <a href="edit-profile.php">Edit Profile</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="education">
    <div class="max-width">
        <div class="container">
            <form action="{{route("jobseeker.profile.update.academics")}}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="education-heading text-center">
                        <h4>Academic Qualification</h4>
                        <hr>
                    </div>
                </div>

                <div class='col-md-12'>
                    @if(count($academics))
                    <table class="table table-striped">
                        <thead>
                            <th> Standard </th>
                            <th> Marks </th>
                            <th> Institute </th>
                            <th> Board <th>
                            <th> Actions </th>
                        </thead>
                        <tbody>
                            @foreach ($academics as $academic)
                            <tr style="width:100%; ">
                                <td style="width: auto"> {{$academic->standard}} </td>
                                <td style="width: auto"> {{$academic->marks}} </td>
                                <td style="width: auto"> {{$academic->institute}} </td>
                                <td style="width: auto"> {{$academic->board}} </td>
                                <td style="width: auto"> 
                                    <form action="{{route("jobseeker.profile.delete.academics")}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$academic->id}}" />
                                        <button class="btn btn-danger">Delete</button> 
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @else
                    <div class="not-available"> No Academic records available yet </div>
                    @endif
                </div>

                

                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="standard" class="form-control"  placeholder="Standard">
                        <label for="Standard"> Standard </label>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="Number" name="marks" class="form-control"  placeholder="Marks">
                        <label for="Marks">Marks</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="institute" class="form-control"  placeholder="Institute">
                        <label for="Institute">Institute</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="board" class="form-control"  placeholder="Board">
                        <label for="Board">Board</label>
                    </div>
                </div>

                

                <div class="col-lg-12">
                    <div class="add-more-button text-end mb-3">
                        <button class="btn btn-add-more">Add More</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="next-button mb-3 text-center">
                        <a class="btn btn-next-button" href="{{route("jobseeker.experience.edit")}}"> Next </a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection