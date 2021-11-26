@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Equipamento') }}
                    <a href="{{ route('home') }}" type="button" class="float-right btn btn-secondary">Voltar</a>
                </div>

                <div class="card-body">
                     {!! Form::open(['class', 'name'=>'form', 'route'=>['atualizar', $equipamento->id], 'method'=>'put']) !!}
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" required value="{{ $equipamento->nome }}">                        
                        </div>
                        <div class="col-md-6">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" name="marca" id="marca" required value="{{ $equipamento->marca }}">
                        </div>
                        <div class="col-md-6">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo" required value="{{ $equipamento->modelo }}">    
                        </div>
                        <div class="col-12" style="margin: 15px 0;">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" required rows="7">{{ $equipamento->observacao }}</textarea>
                        </div>    
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection                        