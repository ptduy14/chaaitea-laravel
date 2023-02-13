<tbody>
    <tr>
        <th>Tổng số lượng sản phẩm: </th>
        <td>{{Session()->get('cart')->totalQuantity}}</td>
    </tr>
    <tr>
        <th>Tổng tiền: </th>
        <td class="product-subtotal">₫{{number_format(Session()->get('cart')->totalPrice)}}</td>
    </tr>
</tbody>