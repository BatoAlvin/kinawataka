
<table>
    <tr>
      <th>Member</th>
      <th>Loan Amount</th>
      <th>Return Amount</th>
      <th>Loans Description</th>
      <th>Loans Date</th>
    </tr>
    @foreach($loan as $loans)
    <tr>
      <td>{{$loans->memberloan->family_name}}</td>
      <td>{{$loans->loan_amount}}</td>
      <td>{{$loans->return_amount}}</td>
      <td>{{$loans->loan_description}}</td>
      <td>{{$loans->loan_date}}</td>
    </tr>
@endforeach
  </table>
