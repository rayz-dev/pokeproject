@extends('layouts.app')

@section('content')

<div class="container mt-4" id="pokedex-container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            
            <div class="row pb-4 py-md-5">
                <div class="col">
                    <a class="generation d-inline-flex flex-row justify-content-center align-items-center" href="<?php echo e(route('pokedex-generation', [0])); ?>">
                        <img src="<?php echo e(asset('images/content/gen-all.png')); ?>" class="img-fluid d-inline-block">
                        <p class="text-dark position-absolute"><span class="text-primary">All</span> generations</p>
                    </a>
                </div>
            </div>
           
            <div class="row justify-content-center py-md-5">
                <?php $__currentLoopData = $generations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $generation_id => $generation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 py-5 py-md-0 mx-md-5 mx-lg-0">
                        <a class="generation generation-small d-inline-flex flex-row justify-content-center align-items-center h-100" href="<?php echo e(route('pokedex-generation', [$generation_id], ['gen_info'=>$generation])); ?>">
                            <img src=<?php echo e("https://assets.pokemon.com/assets/cms2/img/pokedex/full/".$generation["starter"].".png"); ?>  class="img-fluid d-inline-block">
                            <p class="text-dark position-absolute"><span class="text-primary"><?php echo e($generation["ordinal"]); ?></span> generation</p>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </div>
</div>

@endsection
