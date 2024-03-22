

var contFormacao = 0
var contExperiancia = 0




$(function () {
  $('#cep').mask('00000-000');
  $('#cnpj').mask('00.000.000/0000-00');
  $('#cpf').mask('000.000.000-00');
  $('#celular').mask('(00) 00000-0000');
  $('#fixo').mask('0000-0000');

})


//Completar Cidade e Estado pelo CEP

$(function () {
  // code
  $('#cep').on('keyup', function (a) {
    if ($(this).val().length == 9) {
      $.ajax("http://viacep.com.br/ws/" + $(this).val().replace("-", "")
        + "/json/", {
        success: function (res) {
          $("[name=cidade]").val(res.localidade);
          $("[name=estado]").val(res.uf);
        }
      });
    }
  });
});

// erro button preenchimento fo
$(document).ready(function () {
  $('#cadastrar').click(function () {
    var todosPreenchidos = true;

    // Percorre os campos de entrada do formulário
    $('#formCadastro input').each(function () {
      if ($(this).val().trim() === '') {
        todosPreenchidos = false;
        $(this).removeClass("border-gray-300").addClass("border-red-500"); // Destaque o campo vazio
      } else {
        $(this).removeClass("border-red-500").addClass("border-gray-300"); // Remova o destaque quando preenchido
      }
    });

    // Verifica se todos os campos estão preenchidos
    if (todosPreenchidos) {
      $("#alert-2").removeClass("hidden").addClass("flex").hide();

      // Aqui você pode submeter o formulário ou realizar outra ação
    } else {
      $("#alert-2").removeClass("hidden").addClass("flex").show();

    }
  });
});

// Preenchimento erro form
$(document).ready(function () {
  $('#formCadastro input').blur(function () {
    var todosPreenchidos = true;

    // Percorre os campos de entrada do formulário
    if ($(this).val().trim() === '') {
      todosPreenchidos = false;
      $(this).removeClass("border-gray-300").addClass("border-red-500"); // Destaque o campo vazio
    } else {
      $(this).removeClass("border-red-500").addClass("border-gray-300"); // Remova o destaque quando preenchido
    }


    // Verifica se todos os campos estão preenchidos
    if (todosPreenchidos) {
      $("#alert-2").removeClass("hidden").addClass("flex").hide();

      // Aqui você pode submeter o formulário ou realizar outra ação
    } else {
      $("#alert-2").removeClass("hidden").addClass("flex").show();

    }
  });
});


//Muda o Form Conforme o tipo de usuário

$(document).ready(function () {
  $("#dropdown").change(function () {
    let selectedOption = $(this).val();

    let _token = $("#token").val();
    $.ajax({
      url: '/conta/tipo_conta', // Substitua 'seu_arquivo.php' pelo arquivo que processará a requisição
      method: 'POST', // Pode ser POST ou GET, dependendo da sua implementação
      data: { option: selectedOption, _token },
      success: function (response) {
        $(this).prop("disabled", true);
        console.log(response);
        if (selectedOption === "1") {
          $("#sexo").show();

        } else if (selectedOption === "2") {
          $("#sexo").hide();
        } else if (selectedOption === "0") {
          $("#sexo").hide();
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  })
})


$(document).ready(function () {
  $("#dropdown2").change(function () {
    let selectedOption = $(this).val();
    let _token = $("#tokenSexo").val();
    $.ajax({
      url: '/conta/sexo', // Substitua 'seu_arquivo.php' pelo arquivo que processará a requisição
      method: 'POST', // Pode ser POST ou GET, dependendo da sua implementação
      data: { option: selectedOption, _token },
      success: function (response) {
        $(this).prop("disabled", true);
        console.log(response);
        if (selectedOption === "1") {
          $("#telecon").hide();


        } else if (selectedOption === "2") {
          $("#telecon").show();

        } else if (selectedOption === "0") {
          $("#telecon").hide();

        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  })
})

$(document).ready(function () {
  $("#dropdown3").change(function () {
    let selectedOption = $(this).val();
    let _token = $("#tokenTelecon").val();
    $.ajax({
      url: '/conta/telecon', // Substitua 'seu_arquivo.php' pelo arquivo que processará a requisição
      method: 'POST', // Pode ser POST ou GET, dependendo da sua implementação
      data: { option: selectedOption, _token },

      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  })
})



// $(document).ready(function(){
//   $('#mudarNome').on('focusout', function() {
//     let name = $(this).val();
//     let _token = $('#tokenName').val();

//     $.ajax({
//       url: '/conta/mudarNome',
//       method: 'POST',
//       data: {name, _token},
//       success: function () {
//         console.log(response);
//       },
//       error: function(xhr, status, error) {
//         console.error(error);
//       }
//     })
//   })
// })



//Adiciona Formm de Formação
$(document).ready(() => {
  $('#btnFormacao').on('click', (event) => {
    $('#formacao').append(`
        
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 " for="grid-password">
              Instituição
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="Faculdade" name="instituto[]">
            <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
          </div>
        </div>

        <div class="-mx-3 md:flex mb-2">

          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
              Nome do Curso
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4" id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas" name="curso[]">
          </div>

          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Tipo de Fomação
            </label>
            <div class="flex flex-row-reverse items-center">
              <select class="block appearance-none w-full bg-gray-300 border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="dropdown" name="tipo[]">
                <option value="s">Superior</option>
                <option value="t">Tecnico</option>
              </select>
              <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>

          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Atualmente
            </label>
            <div class="flex flex-row-reverse items-center">
              <select class="block appearance-none w-full bg-gray-300 border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="dropdown" name="cursando[]">
                <option value="Completo">Completo</option>
                <option value="Incompleto">Incompleto</option>
                <option value="Cursando">Cursando</option>
              </select>
              <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>
        
        </div>

       
  
    `)

    contFormacao++
  })
})

// Adiciona Form de Experiencias
$(document).ready(() => {
  $('#btnExperiencia').on('click', (event) => {
    $('#experiencia').append(`
        
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full h-40 px-3 break-all">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
              Descrição
            </label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm bg-grey-lighter border-gray-500  rounded border " placeholder="Taca qualquer coisa ai" name="descricao[]"></textarea>
            <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full px-3 break-all">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                  for="grid-zip">
                  Função na empresa
              </label>
              <input
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                  id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                  name="funcao[]"
                  value="">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-2">
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
              Nome da Empresa
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4" id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas" name="empresa[]">
          </div>

          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
              Trabalha aqui atualmente ?
            </label>
            <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4" id="" name="trabalhando[]">
            <option value="Não">Não</option>
            <option value="Sim">Sim</option>
            </select>
          </div>
        </div>

        
  
    `)

    contExperiancia++
  })
})


//Ferramentas
$(document).ready(() => {
  $('#btnFerramenta').on('click', (event) => {
    $('#ferramenta').append(`
        
    <div class="-mx-3 md:flex mb-6">
      <div class="md:w-full h-40 px-3 break-all">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
            for="grid-zip">
            Nome da ferramenta
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
            name="ferramenta[]"
            value="">
      </div>
    </div>

        
  
    `)

    contExperiancia++
  })
})

//Habilidade
$(document).ready(() => {
  $('#btnHabilidade').on('click', (event) => {
    $('#habilidade').append(`
        
    <div class="-mx-3 md:flex mb-6">
      <div class="md:w-full h-40 px-3 break-all">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
            for="grid-zip">
            Resuma suas habilidade
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
            name="habilidade[]"
            value="">
      </div>
    </div>
        
  
    `)

    contExperiancia++
  })
})

//Linguas
$(document).ready(() => {
  $('#btnLingua').on('click', (event) => {
    $('#lingua').append(`
        
    <div class="-mx-3 md:flex mb-2">
      <div class="md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-zip">
              Nome do indioma
          </label>
          <input
              class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
              id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
              name="nome_l[]"
              value="">
      </div>

      <div class="md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-zip">
              Nivel
          </label>
          <select
              class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
              id="" name="nivel[]">
              <option value="Básico">Básico</option>
              <option value="Intermediário">Intermediário</option>
              <option value="Avançado">Avançado</option>
              <option value="Fluente">Fluente</option>
          </select>
      </div>
    </div>

        
  
    `)

    contExperiancia++
  })
})

//atributos
$(document).ready(() => {
  $('#btnresponsabilidades').on('click', (event) => {
    $('#responsabilidade').append(`
        
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 " for="grid-password">
              responsabilidade
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="Responsabilidades do candidato na empresa" name="responsabilidade[]">
            <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
          </div>
        </div>
        
  
    `)

    contAtributo++
  })
})

//requisitos
$(document).ready(() => {
  $('#btnRequisitos').on('click', (event) => {
    $('#requisito').append(`
        
    <div class="-mx-3 md:flex mb-2">
    <div class="md:w-full px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
        Requisito
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3" id="grid-password" id="" type="text" placeholder="Requisitos para a candidatura" name="requisito[]">
    </div>
    </div>
  
    `)

    contRequisito++
  })
})

$(document).ready(() => {
  $('#btnBaneficios').on('click', (event) => {
    $('#beneficio').append(`
        
    <div class="-mx-3 md:flex mb-2">
    <div class="md:w-full px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
        Benefício
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3" id="grid-password" id="" type="text" placeholder="Benefícios que a empresa oferece" name="beneficio[]">
    </div>
    </div>
  
    `)

    contRequisito++
  })
})


//Paginação AJAX
$(document).ready(() => {

  // Manipulador de evento para cliques na paginação
  $(document).on('click', '.paginacao a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    loadData(page);
  });

  // Manipulador de evento para mudança de seleção na ordenação
  $("#ordenacao").change(function () {
    let orderBy = $(this).val();
    loadData(1, orderBy); // Carregar a primeira página com a nova ordenação
  })

  $(document).on('keyup submit', '.form', function (e) {
    e.preventDefault()
    loadData(0)
  })

  function loadData(page, orderBy) {
    var dados = $('#form').serialize()
    $.ajax({
      url: '/vaga/lista?page=' + page + '&orderBy=' + orderBy,
      type: 'get',
      data: dados,
      success: function (response) {
        $('#data').html($(response).find('#data').html());
      },
    });
  }
});





