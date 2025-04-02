<h2>Заказ на сайте.</h2>
<blockquote>
    <div>
        <div style="color:#000000;font-family:'arial','helvetica',sans-serif;font-size:12px">
            <div style="width:680px">
                <a href="https://russianvine.ru/" rel="noopener noreferrer" title="Русское Вино"
                 target="_blank"
                   alt="Русское Вино"
                   style="border:medium;margin-bottom:20px" class="CToWUd"
                   jslog="138226; u014N:xr6bB; 53:W2ZhbHNlXQ.."></a>
                <p style="margin-bottom:20px;margin-top:0px">Благодарим за интерес к товарам Русское Вино .
                    Ваш заказ получен и поступит в обработку в ближайшее время.</p>
                <table
                    style="border-collapse:collapse;border-left-color:#dddddd;border-left-style:solid;border-left-width:1px;border-top-color:#dddddd;border-top-style:solid;border-top-width:1px;margin-bottom:20px;width:100%">
                    <thead>
                    <tr>
                        <td colspan="2"
                            style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:left">
                            Детализация заказа
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:left">
                            <b>№ заказа:</b> {{ $mail->order_id }}<br>
                            <b>Дата заказа:</b> {{ date('Y-m-d H:i:s') }}<br>
                        </td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:left">
                            <b>E-mail:</b> <a href="pelivan96e@gmail.com" rel="noopener noreferrer"
                                              target="_blank">pelivan96e@gmail.com</a><br>
                            <b>Телефон:</b> <span><span>{{$mail->phone}}</span></span><br>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table
                    style="border-collapse:collapse;border-left-color:#dddddd;border-left-style:solid;border-left-width:1px;border-top-color:#dddddd;border-top-style:solid;border-top-width:1px;margin-bottom:20px;width:100%">
                    <thead>
                    <tr>
                        <td style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:left">
                            Товар
                        </td>
                        <td style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:left">
                            Тип
                        </td>
                        <td style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:left">
                            Модель
                        </td>
                        <td style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:right">
                            Количество
                        </td>
                        <td style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:right">
                            Цена
                        </td>
                        <td style="background-color:#efefef;border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;color:#222222;font-size:12px;font-weight:bold;padding:7px;text-align:right">
                            Итого
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mail->orders as $order)
                    <tr>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:left">
                            {{$order['title']}}
                        </td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:left">
                            {{$order['type']}}
                        </td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:left">
                            {{$order['model']}}
                        </td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:right">
                            {{$order['qty']}}
                        </td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:right">
                            {{$order['price']}}
                        </td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:right">
                            {{$order['total_price']}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"
                            style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:right">
                            <b>Итого:</b></td>
                        <td style="border-bottom-color:#dddddd;border-bottom-style:solid;border-bottom-width:1px;border-right-color:#dddddd;border-right-style:solid;border-right-width:1px;font-size:12px;padding:7px;text-align:right">
                            {{$mail->total}}
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <p style="margin-bottom:20px;margin-top:0px">Если у Вас есть какие-либо вопросы, ответьте на это
                    сообщение.</p>
            </div>
        </div>
    </div>
</blockquote>
