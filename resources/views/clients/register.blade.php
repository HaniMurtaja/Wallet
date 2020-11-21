@extends('clients.layout')
@section('content')
 <!-- start:form login -->


        <section class="panel panel-default">
                            <header class="panel-heading text-center panel-relative">
                                <h3><b>CREATE MY-WALLET ACCOUNT</b></h3>
                            </header>
                            <div class="panel-body">
                            <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form class="form-horizontal" role="form" method="post" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Names</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="names" id="inputEmail1" placeholder="Names">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Contacts</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="contact" id="inputEmail1" placeholder="contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="email" class="form-control" name="email" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-lg-2 col-sm-2 control-label">Phone Number</label>
                                        <div class="col-lg-10">
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Birthdate</label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" name="phone" id="inputEmail1" placeholder="Birthdate">
                                        </div>
                                    </div>
                                    
                                    
                                   <div class="form-group">
                                   <form method="post" action="/image/upload" enctype="multipart/form-data">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Image</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control" name="image" id="image" placeholder="image">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Password">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-primary">CREATE ACCOUNT</button>
                                            <a href="{{ route('login') }}" class="btn btn-primary" >BACK TO LOGIN</a>
                                        </div>
                                    </div>
                                </form>
                    
                                </div>
</div>
                            </div>
                        </section>



@endsection
