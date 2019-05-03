<a href="">Cám ơn bạn đã đặt hàng

</a>
<!-- <table>
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$nguoidung->id}}</td>
        </tr>
    </tbody>
</table>
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 3 Simple Tables</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .example{
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="example">
        <div class="container">
            <div class="row">
            <div class="table-responsive">    
                <table class="table table-bordered"  style="margin: 155px  ; margin: auto; " >
                    <thead>
                        <tr >

                            <th style = "width: 95px; font-weight: bold; border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">Mã sản phẩm</th>
                            <th style = "width: 95px; font-weight: bold; border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">Ngày đặt hàng</th>
                            <th style = "width: 95px; font-weight: bold;border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">Hình thức thanh toán</th>
                            <th style = "width: 95px; font-weight: bold; border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">Tổng tiền</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">

                            <td style = "border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">{{$nguoidung->id}}</td>
                            <td style = "border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">{{$nguoidung->date_order}}</td>
                            <td style = "border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">{{$nguoidung->payments}}</td>
                            <td style = "border-bottom: 1px solid #3E8DEC;border-right: 1px solid #3E8DEC;">{{$nguoidung->total}} VNĐ</td>
                        </tr>

                    </tbody>
                </table>
             </div>   
            </div>
        </div>
 
    </div>
</body>
</html>