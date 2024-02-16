@extends('master.layout.app')

@section('content')
    <div class="authentication min-h-[calc(100vh_-_12rem)]">
        <div class="authentication-content">
            <div class="authentication-header">
                <h1 class="title">
                    Создать QR код
                </h1>

                <p class="description">
                    Выберите модель изделия и нажмите кнопку "Сгенерировать QR код"
                </p>
                <p class="description">
                    Для каждого изделия генерируется уникальный QR код
                </p>
            </div>
            {{ $form->render() }}
        </div>
    </div> 
@endsection