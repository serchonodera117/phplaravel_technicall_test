<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/state_page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>{{$title}}</title>
</head>
<body>
            <header class="mainheader">
                <div class="title_container">
                    <h1>{{$title}}</h1>
                </div>
                <div class="left_column">
                   <div class="container-fluid">
                        <form class="d-flex" role="search" >
                            <input 
                            id="local-search"
                            class="form-control me-2" 
                            type="search" placeholder="Municipio" aria-label="Buscar"
                            />
                            <button class="btn btn-outline-success" type="search" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                            </button>
                            <div id="div-searchlist" class="contianer-search-list hidden"></div>
                        </form>
                    </div>
                </div>
            </header>
    
        @if(isset($municipios))
            <div class="div-list-m">
                <table class="table table-striped">
                    <thead>
                        <th>Municipios</th>
                        <th></th>
                    </thead>
                    <tbody>
                      @foreach($municipios as $m)
                        <tr>
                            <td>{{$loop->index+1}}.-</td>
                            <td>{{$m}}</td>
                        <tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        @endif
</body>
    <script>
        //local search bar to avoid multiple http request.

        const municipalities = @json($municipios);
        const input = document.getElementById('local-search');
        const divSearchList = document.getElementById('div-searchlist');
        var searchlist = []
        // divSearchList.style.display = "none"
        input.addEventListener('input',(e)=>{
            const value = e.target.value.toLowerCase();
            
            if(value.length>0){
                divSearchList.classList.remove('hidden');
            }else{
                divSearchList.classList.add('hidden');
            }

            searchlist = municipalities.filter(x =>
                x.toLowerCase().includes(value)
            )

            divSearchList.innerHTML = searchlist.map((element)=>`
                 <label> ${element}</label>`
            )
        })
    </script>
</html>