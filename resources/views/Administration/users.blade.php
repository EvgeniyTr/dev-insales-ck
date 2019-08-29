@extends('Administration.main')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header card-title text-md-center">Список пользователей модуля CloudKassir</h5>

                <div class="card-body">

                    {{-- Прогон массива пользователей для отображения достоверной картины состояния учетных записей --}}
                    @php
                        $inactive = [];
                        $errors = [];
                        $deleted = [];
                        $correct = [];

                        foreach ($users as $user) {
                            if (!empty($user['deleted_at'])) {
                                $deleted[] = $user['insales_id'];
                                $user['status'] = 'dark';
                            } elseif (!isset($user['fieldIncomeId'], $user['fieldIncomeReturnId'], $user['widgetId'])) {
                                $errors[] = $user['insales_id'];
                                $user['status'] = 'danger';
                            } elseif (!$user['apiSecret'] || !$user['publicId']) {
                                $inactive[] = $user['insales_id'];
                                $user['status'] = 'secondary';
                            } else {
                                $correct[] = $user['insales_id'];
                                $user['status'] = 'primary';
                            }
                        }
                    @endphp

                    <div class="alert alert-info mb-0">
                        <div class="text-md-center">
                            <strong>InSales ID</strong> пользователя <span class="badge badge-primary">синий</span>,
                            если все установлено и настроено правильно.
                            <br/>
                            <span class="badge badge-secondary">Серый</span> цвет используется для обозначения неактивных
                            пользователей (без подключенных API Secret и Public ID),
                            <span class="badge badge-danger">красный</span> для учетных записей, при установке которых произошла ошибка
                            (отсутствует одно из дополнительных полей или виджет), и
                            <span class="badge badge-dark">темно-серый</span> для магазинов, удаливших приложение.
                        </div>
                    </div>

                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-md-center">InSales ID</th>
                                <th class="text-md-center">URI магазина</th>
                                <th class="text-md-center">ИНН</th>
                                <th class="text-md-center">Система налогообложения</th>
                                <th class="text-md-center">НДС</th>
                                <th class="text-md-center">Поле чеков прихода</th>
                                <th class="text-md-center">Поле чеков возврата</th>
                                {{--<th class="text-md-center">Вебхук</th>--}}
                                <th class="text-md-center">Виджет</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-md-center">
                                        <span class="badge badge-{{ $user['status'] }}">{{ $user['insalesId'] ?? 'N/A' }}</span>
                                    </td>

                                    <td class="text-md-center">
                                        <a href="http://{{ $user['urlShop'] }}" class="card-link"
                                           target="_blank">{{ $user['urlShop'] ?? 'N/A' }}</a>
                                    </td>

                                    <td class="text-md-center">
                                        {{ $user['inn'] ?? '---' }}
                                    </td>

                                    <td class="text-md-center">
                                        {{ $user['taxationSystem'] ?? '---' }}
                                    </td>

                                    <td class="text-md-center">
                                        {{ $user['nds'] ?? '---' }}
                                    </td>

                                    <td class="text-md-center">
                                        {{ $user['fieldIncomeId'] ?? '---' }}
                                    </td>

                                    <td class="text-md-center">
                                        {{ $user['fieldIncomeReturnId'] ?? '---' }}
                                    </td>

                                    {{--<td class="text-md-center">
                                        {{ $user['onUpdateWebhookId'] ?? '---' }}
                                    </td>--}}

                                    <td class="text-md-center">
                                        {{ $user['widgetId'] ?? '---' }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-center mb-0">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
