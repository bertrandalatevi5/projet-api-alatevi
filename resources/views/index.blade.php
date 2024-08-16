<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROJET-API-ALATEVI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="container">
            <div class="col-md-6 mx-auto my-auto">
                <div class="card my-5 mx-auto">
                    <div class="text-center p-3">
                        <h4 class="modal-title">Demande d'accès à l'API</h4>
                    </div>
                    <div class="trait"></div>
                    <div class="card-body mb-3">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <form action="{{route('store_users')}}" method="POST" >
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" name="prenom" placeholder="ex: Jean" value="{{old('prenom')}}" class="form-control @error('prenom') is-invalid @enderror">
                                    <span class="text-danger"><i>@error('prenom')
                                        {{$message}}
                                    @enderror</i></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" name="nom" placeholder="ex: Dupont" value="{{old('nom')}}" class="form-control @error('nom') is-invalid @enderror">
                                    <span class="text-danger"><i>@error('nom')
                                        {{$message}}
                                    @enderror</i></span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="entreprise" class="form-label">Entreprise</label>
                                <input type="text" name="entreprise" placeholder="Votre entreprise" value="{{old('entreprise')}}" class="form-control @error('entreprise') is-invalid @enderror">
                                <span class="text-danger"><i>@error('entreprise')
                                    {{$message}}
                                @enderror</i></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" name="email" placeholder="Votre email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                <span class="text-danger"><i>@error('email')
                                    {{$message}}
                                @enderror</i></span>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6 mb-4">
                                    <label for="ville" class="form-label">Ville</label>
                                    <input type="text" name="ville" placeholder="Votre ville" value="{{old('ville')}}" class="form-control  @error('ville') is-invalid @enderror">
                                    <span class="text-danger"><i>@error('ville')
                                        {{$message}}
                                    @enderror</i></span>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label for="adresse" class="form-label">Adresse</label>
                                    <input type="text" name="adresse" placeholder="Votre adresse" value="{{old('adresse')}}" class="form-control @error('adresse') is-invalid @enderror">
                                    <span class="text-danger"><i>@error('adresse')
                                        {{$message}}
                                    @enderror</i></span>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </main>
    <style>
        *{
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }
        label{
            font-weight: 500;
        }
        .form-group input{
            border-radius: unset;
            font-size: 15px;
            color: #5e5858 !important;
        }
        .card{
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2) !important;
            border-radius: 20px;
        }
        .btn{
            border-radius: unset;
            background-color: #3786bd;
            color: #fff;
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            width: 180px;
        }
        .btn:hover {
            background: #2f73a3;
            color: #fff;
        }
        .trait{
            height: 10px;
            background-color: #5eb2b3;
            margin-bottom: 10px
        }
        body{
            background-color: #5eb2b3;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>