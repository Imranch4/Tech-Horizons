@extends('layouts.master')
@section('title', 'Page Responsable')
@section('additional_styles')
<style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            margin-right: -120px;
            padding: 0px;
            margin-left: 0px;
            align-items: center;
        }

        .search-bar {
            margin-bottom: 20px;
            width: 90%;
        }

        .search-bar input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #4e54c8;
            color: white;
            font-weight: 500;
        }

        tr:hover {
            background-color: #f8f9fa;
        }


        

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-details {
            background-color: #6366f1;
            color: white;
        }

        .btn-delete {
            background-color: #dc2626;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Modal pour les détails */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            width: 70%;
            max-width: 600px;
            border-radius: 8px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 24px;
            cursor: pointer;
        }

        .subscriber-details {
            margin-top: 20px;
        }

        .detail-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .detail-label {
            font-weight: bold;
            color: #666;
        }
</style>
@endsection

@section('content')

<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Rechercher un abonné..." onkeyup="filterByName()">
    </div>

    <table id="subscribersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
            <tr>
                <td>{{$subscription->user_id}}</td>
                <td>{{$subscription->user->name}}</td>
                <td>{{$subscription->user->email}}</td>
                <td class="actions">


                    {{-- <form action="{{route('responsable.delete_subscription')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                        <button class="btn btn-delete">Supprimer</button>
                        </form> --}}


                <form action="{{route('responsable.delete_subscription')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                    <button class="btn btn-delete">Supprimer</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection



@section('scripts')
<script>
function filterByName() {
    var input = document.querySelector('.search-bar input');
    var filter = input.value.toLowerCase();
    var rows = document.querySelectorAll('#subscribersTable tbody tr');

    rows.forEach(row => {
        var nameCell = row.querySelector('td:nth-child(2)');

        if (nameCell) {
            var nameText = nameCell.textContent.toLowerCase(); 
            row.style.display = nameText.includes(filter) ? '' : 'none';
        }
    });
}


        window.onclick = function(event) {
            if (event.target == document.getElementById('detailsModal')) {
                closeModal();
            }
        }
</script>
@endsection