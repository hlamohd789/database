@extends('layout.app')
@section('content')
<div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$tbl_val}}
                </div>
                <?php $txtval ='';?>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <!-- New Task Form -->
                    @if($val == 0)
                        <form action="{{route('task.insert')}}" method="POST" class="form-horizontal">
                        <?php $txtval ='';?>
                    @endif
                     @if($val == 1)
                        @foreach($taskss as $index =>$task)
                        <form action="{{url('up/'.$task->id)}}" method="POST" class="form-horizontal">
                        <?php $txtval =$task->name;?>
                        @endforeach
                    @endif

                    
                       @csrf
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value='<?php echo"$txtval";?>'>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group" >
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>{{$btn_val}}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>

            <!-- Current Tasks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>created at</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                    
                            @foreach($tasks as $index =>$task)
                            <tr>
                            <td class="table-text"><div>{{$task->name}}</div></td>
                            <td class="table-text"><div>{{$task->created_at}}</div></td>
                            <td>
                                            <form action="{{route('task.delete',$task->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{url('update/'.$task->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-pencil">
                                                    <i class="fa fa-btn fa-pencil"></i>Update
                                                </button>
                                            </form>
                                        </td>
                                       
                                        </tr>
                             @endforeach
                             

                                        <!-- Task Delete Button -->
                                       
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

        @endsection