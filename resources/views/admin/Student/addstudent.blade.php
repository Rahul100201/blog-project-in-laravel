@extends('layouts.backend.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Jay</td>
                        <td>Jay@gamil.com</td>
                        <td>8756787678</td>
                        <td>Rudrapur</td>
                        <td><a class="btn btn-info" href="">view</a>
                        <a class="btn btn-primary" href="">edit</a>
                        <a class="btn btn-success" href="">delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


