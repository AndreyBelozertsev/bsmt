@extends('layout.app')

@section('content')
    <p>Модель - {{ $product->model->title }}</p>
    <p>Мастер - {{ $product->user->name }}</p>

    <p>Фабрика - {{ $product->factory?->title }}</p>
    <p>Дата изготовления - {{ getHumanDate($product->created_at) }}</p>
    @if($product->activated_at)
        <p>Дата активации - {{ getHumanDate($product->activated_at) }}</p>
    @endif
    @if($product->expaire_at)
        <p>Гарантия до - {{ getHumanDate($product->expaire_at) }}</p>
    @endif
    @if($activated)
        «Благодарим за оказанное доверие! 
        Мы заботимся о Вашей безопасности и комфорте. 
        Отсканированный Вами QR-код уникален для каждого изделия. 
        Он подтверждает подлинность продукции BeeSmart, 
        поможет в сборке.
        По QR-коду Вы можете проверить гарантийный срок - 24 месяца с момента покупки»
    @endif
@endsection