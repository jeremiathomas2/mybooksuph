@extends('layouts.app')

@section('title', 'Individual Buyers — Ufunuo Publishing House')
@section('breadcrumb', 'Individual Buyers')

@section('content')
<div class="view active">
    <div class="page-header">
        <div><div class="page-title">Individual Buyers</div><div class="page-subtitle">Members of the public who purchase books individually</div></div>
    </div>
    <div class="card">
        <div class="table-wrap">
            <table>
                <thead><tr><th>Buyer</th><th>Contact</th><th>Region</th><th>Orders</th><th>Total Spent</th><th>Last Order</th></tr></thead>
                <tbody>
                    <tr><td><div style="font-weight:700">Mama Grace Mwita</div></td><td class="td-muted">+255 754 111 222</td><td>Mwanza</td><td>4</td><td>TZS 62,000</td><td class="td-muted">14 Jan 2024</td></tr>
                    <tr><td><div style="font-weight:700">Br. John Sanga</div></td><td class="td-muted">+255 715 333 444</td><td>Dodoma</td><td>2</td><td>TZS 30,000</td><td class="td-muted">13 Jan 2024</td></tr>
                    <tr><td><div style="font-weight:700">Sr. Ruth Njau</div></td><td class="td-muted">+255 686 555 666</td><td>Dar es Salaam</td><td>7</td><td>TZS 145,000</td><td class="td-muted">10 Jan 2024</td></tr>
                    <tr><td><div style="font-weight:700">Dkt. Peter Mwangi</div></td><td class="td-muted">+255 762 777 888</td><td>Arusha</td><td>1</td><td>TZS 18,000</td><td class="td-muted">08 Jan 2024</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
