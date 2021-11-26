@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Equipamentos') }}
                    <a href="{{ route('criar') }}" type="button" class="float-right btn btn-primary">Adicionar Equipamentos</a>
                </div>

                @php
                    use Illuminate\Support\Facades\DB;

                    $equipamentos = DB::select('SELECT * FROM equipamento ORDER BY marca ASC');
                @endphp
                
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    var msg = '{!! Session::get('create') !!}';
                    var exist = '{!! Session::has('create') !!}';
                    if (exist) {
                        Swal.fire({
                            title: 'Adicionado!',
                            text: 'Equipamento adicionado com sucesso!',
                            showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                             },
                            hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                                }
                        })
                    }
                </script>
                <script>
                    var msg = '{!! Session::get('update') !!}';
                    var exist = '{!! Session::has('update') !!}';
                    if (exist) {
                        Swal.fire({
                            title: 'Atualizado!',
                            text: 'Equipamento atualizado com sucesso!',
                            showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                             },
                            hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                                }
                        })
                    }
                </script>

                        <script>
                            
                         
                           var msg = '{!! Session::get('delete') !!}';
                           var exist = '{!! Session::has('delete') !!}'
                           
                             if (exist) {
                                 Swal.fire({
                                 title: 'Excluído!',
                                 text: 'Equipamento excluído com sucesso!',
                                 showClass: {
                                 popup: 'animate__animated animate__fadeInDown'
                                    },
                                 hideClass: {
                                 popup: 'animate__animated animate__fadeOutUp'
                                    }
                                })

                            }
                </script>

                <div class="card-body">
                    @if (isset($equipamentos))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Observação</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($equipamentos as $equipamento)
                                <tr>
                                    <th scope="row">{{ $equipamento->id }}</th>
                                    <td>{{ $equipamento->nome }}</td>
                                    <td>{{ $equipamento->marca }}</td>
                                    <td>{{ $equipamento->modelo }}</td>
                                    <td>{{ $equipamento->observacao }}</td>
                                    <td class="row">
                                        <a href="{{ route('editar', $equipamento->id) }}" type="button"
                                            class="btn btn-secondary" style="margin-top: 10px; margin-left: 10px;">Editar</a>
                                        {!! Form::open(['class', 'name' => 'form', 'route' => ['excluir', $equipamento->id], 'method' => 'delete']) !!}
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            style="margin-top: 10px; margin-left: 10px;">Excluir</button>
                                        </form>    
                                    </td>
                    
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                       @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
