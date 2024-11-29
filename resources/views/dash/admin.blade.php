{{-- @extends('dash.dashlayout') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
        font-family: 'lato', sans-serif;
      }
      .container {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 10px;
        padding-right: 10px;
      }

      h2 {
        font-size: 26px;
        margin: 20px 0;
        text-align: center;
        small {
          font-size: 0.5em;
        }
      }

      .responsive-table {
        li {
          border-radius: 3px;
          padding: 25px 30px;
          display: flex;
          justify-content: space-between;
          margin-bottom: 25px;
        }
        .table-header {
          background-color: #95A5A6;
          font-size: 14px;
          text-transform: uppercase;
          letter-spacing: 0.03em;
        }
        .table-row {
          background-color: #ffffff;
          box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
        }
        .col-1 {
          flex-basis: 10%;
        }
        .col-2 {
          flex-basis: 40%;
        }
        .col-3 {
          flex-basis: 25%;
        }
        .col-4 {
          flex-basis: 25%;
        }

        @media all and (max-width: 767px) {
          .table-header {
            display: none;
          }
          .table-row{

          }
          li {
            display: block;
          }
          .col {

            flex-basis: 100%;

          }
          .col {
            display: flex;
            padding: 10px 0;
            &:before {
              color: #6C7A89;
              padding-right: 10px;
              content: attr(data-label);
              flex-basis: 50%;
              text-align: right;
            }
          }
        }
      }
</style>
</head>

<body>
    <div class="container">
        <h2>User Data</h2>
        <ul class="responsive-table">
          <li class="table-header">
            <div class="col col-1">Sr.no</div>
            <div class="col col-1">User Name</div>
            <div class="col col-2">Email ID</div>
            <div class="col col-3">Phone number</div>
          </li>

          @foreach ($users as $key => $user)
          <li class="table-row">
            <div class="col col-4" data-label="Payment Status">{{ $i + $key + 1 }}</div>
            <div class="col col-1" data-label="Job Id">{{ $user->name }}</div>
            <div class="col col-2" data-label="Customer Name">{{ $user->email }}</div>
            <div class="col col-3" data-label="Amount">{{ $user->phone_number }}</div>

          </li>
          @endforeach
          {{-- <li class="table-row">
            <div class="col col-1" data-label="Job Id">42442</div>
            <div class="col col-2" data-label="Customer Name">Jennifer Smith</div>
            <div class="col col-3" data-label="Amount">$220</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li>
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">42257</div>
            <div class="col col-2" data-label="Customer Name">John Smith</div>
            <div class="col col-3" data-label="Amount">$341</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li>
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">42311</div>
            <div class="col col-2" data-label="Customer Name">John Carpenter</div>
            <div class="col col-3" data-label="Amount">$115</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li> --}}
        </ul>
      </div>

                {!! $users->links() !!}


</body>
</html>
