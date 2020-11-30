@extends("layout.layout")

@section("content")
    <div>
        <form  method="post" enctype="multipart/form-data" action="{{route('quiz.save')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Question Title</label>
                    <label>
                        <input type="text" class="form-control @error('question') 'is-invalid' @enderror"  placeholder="question" name="question">
                    </label>

                    @error('question')
                        <p class="text-danger">{{ $errors->first('question') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Answer</label>
                    <label>
                        <input type="text" class="form-control @error('first') 'is-invalid' @enderror"  placeholder="first" name="first">
                    </label>

                    @error('first')
                        <p class="text-danger">{{ $errors->first('first') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Second Answer</label>
                    <label>
                        <input type="text" class="form-control @error('second') 'is-invalid' @enderror"  placeholder="second" name="second">
                    </label>

                    @error('second')
                        <p class="text-danger">{{ $errors->first('second') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Third Answer</label>
                    <label>
                        <input type="text" class="form-control @error('third') 'is-invalid' @enderror"  placeholder="third" name="third">
                    </label>

                    @error('third')
                        <p class="text-danger">{{ $errors->first('third') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fourth Answer</label>
                    <label>
                        <input type="text" class="form-control @error('fourth') 'is-invalid' @enderror"  placeholder="fourth" name="fourth">
                    </label>

                    @error('fourth')
                        <p class="text-danger">{{ $errors->first('fourth') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correct Answer</label>
                    <label>
                        <input type="text" class="form-control @error('correct') 'is-invalid' @enderror"  placeholder="correct" name="correct">
                    </label>

                    @error('correct')
                        <p class="text-danger">{{ $errors->first('correct') }}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
