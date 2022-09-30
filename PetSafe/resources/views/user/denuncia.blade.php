@extends('layouts.layout-user')

    @section('content')

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3">
                <div class="m-4 m-lg-5">
                    <h1 class="display-6 fw-bold">Denuncia maltrato</h1><br>
                    <p class="fs-6">
                        Lorem Ipsum is simply dummy text of the printing and typesetting 
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        1500s, when an unknown printer took a galley of type and scrambled it to make a 
                        type specimen book. It has survived not only five centuries, but also the leap into 
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 
                        1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
                        recently with desktop publishing software like Aldus PageMaker including versions 
                        of Lorem Ipsum.
                    </p><br>
                    <h1 class="display-6 fw-bold">Para realizar una denuncia usted debe:</h1><br>
                    <ul>
                        <li><p>Ingresar a <a href="https://www.comisariavirtual.cl/" target="_blank">
                            www.comisariavirtual.cl</a> con la Clave Única.
                            Luego hay que rellenar el formulario con todos los datos del delito.</p>
                        </li>
                        <li>
                            <p>Una vez completada la denuncia, Carabineros enviará los datos a la Fiscalía,
                                para que se de inicio a la investigación correspondiente.
                            </p>
                        </li>
                        <li>
                            <p>
                                PDI Mesa Central: +22 70 80 00
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    @endsection