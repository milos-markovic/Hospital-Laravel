@extends("layouts.app")

@section("content")

<h2 class="display-4 text-center mb-4">Bolesti:</h2>

<div class="row justify-content-center">
    <div class="col-8">
    
        <div class="card">
            <table class="table table-hover m-0">
                <thead class="bg-light text-dark">
                    <tr>
                        <th></th>
                        
                        <th></th>
                        <th></th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($bolesti as $bolest)
                        <tr>
                            <td>{{ $bolest->dijagnoza_naziv }}</td>
                            
                        <td><a href="{{ route('bolesti.edit',$bolest->dijagnoza_id) }}" class="btn btn-primary btn-sm">Izmeni</a></td>
                        <td>
                            <form action="{{ route('bolesti.destroy',$bolest->dijagnoza_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <a href="{{ route('bolesti.create') }}" class="btn btn-primary mt-4">Nova bolest</a>
    
    </div>
</div>




@stop



