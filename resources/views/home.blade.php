@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <h1>Lista de pessoas</h1>
        </div>
        <div class=" col-12">
            <table id="myTable" class="dt-responsive nowrap display">
                <thead class="text-center">
                    <tr class="text-center">
                        <th class="">Nome</th>
                        <th class="">CPF / CNPJ</th>
                        <th class="">RG</th>
                        <th class="">Data de Nascimento</th>
                        <th class="">Estado civil</th>
                        <th class="">Endereço</th>
                        <th class="">Telefone</th>
                        <th class="">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" onclick="add_people()">
                Adicionar pessoa
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('people.store')}}" id="people">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="_method" id="_method">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar uma pessoa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="name" class="form-label">Nome*</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    O nome é obrigatório.
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="name" class="form-label">CPF/CNPJ*</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control cpf" id="cpf_or_cnpj" name="cpf_or_cnpj" required>
                                <div class="invalid-feedback">
                                    Digite um CPF/CNPJ válido.
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="name" class="form-label">RG</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="rg" name="rg" required>
                                <div class="invalid-feedback">
                                    O RG é obrigatório.
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="name" class="form-label">Data de Nascimento</label>
                            <div class="input-group has-validation">
                                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                                <div class="invalid-feedback">
                                    A data de nascimento é obrigatória.
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="name" class="form-label">Estado civil</label>
                            <div class="input-group has-validation">
                                <select class="form-control" id="marital_status" name="marital_status" required>
                                    <option value="" selected disabled>Selecione</option>
                                    <option value="Solteiro(a)">Solteiro(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Separado(a)">Separado(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Viúvo(a)">Viúvo(a)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um estado civil
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="name" class="form-label">CEP</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control cep" id="cep" name="cep" required>
                                <div class="invalid-feedback">
                                    O CEP é obrigatório.
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="name" class="form-label">Logradouro</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="address" name="address" readonly>
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="name" class="form-label">Bairro</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="neighborhood" name="neighborhood" readonly>
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="name" class="form-label">Cidade</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="city" name="city" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="name" class="form-label">Estado</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="state" name="state" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="name" class="form-label">Número</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="number" name="number" required>
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="name" class="form-label">Complemento</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="complement" name="complement">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="name" class="form-label">Tipo de Telefone</label>
                            <div class="input-group has-validation">
                                <select class="form-control" id="phone_type" name="phone_type" required>
                                    <option value="" selected disabled>Selecione</option>
                                    <option value="Fixo">Fixo</option>
                                    <option value="Celular">Celular</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um tipo de telefone
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="name" class="form-label">Número de telefone</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                <div class="invalid-feedback">
                                    O telefone é obrigatório.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<form id="delete_people" method="DELETE" action="{{ route('people.destroy', '') }}"></form>
@endsection

@section('javascript')
<script src="{{asset('js/jquery-3.6.1.min.js')}}" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.inputmask.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('js/valida_cpf_cnpj.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.js')}}"></script>
<script type="text/javascript">

// FUNÇÃO PARA ADICIONAR PESSOAS
    function add_people() {
        $('#people')[0].reset();    
        $('#people').attr('action', '{{route("people.store")}}');
        $('#_method').val('POST');
        $('#id').val('');
        $('#exampleModal').modal('show');
    }
// FUNÇÃO PARA EDITAR PESSOAS
    function edit_people(id) {
        Swal.fire({
            text: "Aguarde...",
        })
        Swal.showLoading();
        $.get("{{route('people.show', '')}}/"+id, function (people) {
            Object.entries(people).forEach(value => {
                $('#'+value[0]).val(value[1]);
            });
            $('#exampleModal').modal('show');
            Swal.close();
            $('#people').attr('action', '{{route("people.update", '')}}'+`/${id}`);
            $('#_method').val('PUT');
        })    
    }
// FUNÇÃO PARA DELETAR PESSOAS
    function delete_people(id) {
        Swal.fire({
            title: 'Deletar esta pessoa?',
            text: 'Esta ação não poderá ser desfeita.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#258954',
            cancelButtonColor: '#e06666',
            confirmButtonText: 'Sim, deletar',
            cancelButtonText: `Não, cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    text: "Aguarde...",
                })
                Swal.showLoading();
                $.ajax({
                    url: $('#delete_people').attr('action')+`/${id}`,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function () {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: "Esta pessoa foi deletada dos nossos registros.",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        table.ajax.reload();
                    }
                });
            }
        })
    }
// MASCARAS PARA CEP, CPF E TELEFONE
    $('.cep').mask('00000-000');
    $("#phone_number").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999", ],
        keepStatic: true
      });

    var cpfMascara = function (val) {
        return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
    },
    cpfOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(cpfMascara.apply({}, arguments), options);
    }
    };
    $('.cpf').mask(cpfMascara, cpfOptions);

// FUNÇÃO PARA BUSCAR OS DADOS DO CEP
    $('.cep').keyup(function(){
        if(this.value.length == 9){
            $.get("https://viacep.com.br/ws/"+this.value+"/json/", function(data){
                $('#address').val(data.logradouro);
                $('#neighborhood').val(data.bairro);
                $('#city').val(data.localidade);
                $('#state').val(data.uf);
            });
        }else{
            $('#address').val('');
            $('#neighborhood').val('');
            $('#city').val('');
            $('#state').val('');
        }
    });

// VALIDANDO O CPF
    $('#cpf_or_cnpj').keyup(function(){
        if(formata_cpf_cnpj(this.value)){
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }else{
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        }
    });
// FUNÇÃO QUE TRATA O ENVIO DO FORMULÁRIO, TANTO PARA ADICIONAR QUANTO PARA EDITAR PESSOAS
    $('#people').submit(function(e){
        e.preventDefault();

        if(!formata_cpf_cnpj($('#cpf_or_cnpj').val())){
            $('#cpf_or_cnpj').addClass('is-invalid');
            $('#cpf_or_cnpj').focus();
            return false;
        }else{
            $('#cpf_or_cnpj').removeClass('is-invalid');
        }
        Swal.fire({
            text: "Aguarde...",
        })
        Swal.showLoading();
        $.ajax({
            url: this.action,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(){
                if($('#id').val() != ''){
                    text = "Está pessoa foi atualizada com sucesso";
                }else{
                    text ="Está pessoa foi adicionada com sucesso";
                }
                Swal.fire({
                    title: 'Sucesso!',
                    text: text,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                table.ajax.reload();
                $('#exampleModal').modal('hide');
            },
            error: function(errors){
                if(errors.responseJSON.errors){
                    Object.entries(errors.responseJSON.errors).forEach(erro => {
                        Swal.fire({
                        title: 'Ops...',
                        text: erro[1][0],
                        icon: 'warning',
                        confirmButtonText: 'OK'
                        });
                        return;
                    });
                }
            }
        });
    });
    
    var table = '';
// CRIANDO A TABELA USANDO DATATABLES
    $(document).ready(function () {
        table = $('#myTable').DataTable({
            responsive: true,
            "oLanguage": {
                "sUrl": "{{asset('js/Portuguese-Brasil.json')}}"
            },
            "fnDrawCallback": function () {
                $('.change-status-agendamento').change(function () {
                    id = $(this).attr("agendamento_id");
                    $.ajax({
                        type: 'POST',
                        url: "teste",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: this.value
                        }
                    })
                });
            },
            "ajax": {
                "url": "{{route('people.index')}}",
                "dataSrc": ""
            },
            "columns": [{
                    "data": "name"
                },
                {
                    "data": "cpf_or_cnpj"
                },
                {
                    "data": "rg"
                },
                {
                    data: "birth_date",
                    sortable: false,
                    render: function (data, type, row) {
                        var dia = data;

                        dia = dia.split("-");

                        dia = dia[2] + "/" + dia[1] + "/" + dia[0];

                        return dia;
                    }
                },
                {
                    "data": "marital_status"
                },
                {
                    data: null,
                    render: function (people, type, row) {
                        complement = people.complement != null ? " (" + people.complement +
                            ")" : '';
                        return people.address + ", " + people.number + " - " + people
                            .neighborhood + ", " + people.city + " - " + people.state +
                            complement;
                    }
                },
                {
                    data: null,
                    render: function (people, type, row) {
                        return people.phone_type + ": " + people.phone_number;
                    }
                },
                {
                    data: null,
                    render: function (people, type, row) {
                        html =
                            "<button class='btn btn-primary' onclick='edit_people("+people.id+")'>✏️</button> <button class='btn btn-danger ml-2' onclick='delete_people("+people.id+")'>🗑️</button>";
                        return html;
                    }
                },
            ]
        });
    });

</script>
@endsection
