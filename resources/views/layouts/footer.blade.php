<footer class="text-center">
    <small>All content & design © Pokémon Database, 2008-2021. Pokémon images & names © 1995-2021 Nintendo/Game Freak.</small>
</footer>

@if (Request::is('pokedex*') || Request::is('builder/create') || Request::is('builder/manage') ||Request::is('builder') || Request::is('account/config') || Request::is('feed*'))

    <script src="{{ asset('js/pokedex.js') }}"></script>

@endif
    
@if (Request::is('builder') || Request::is('feed/share'))

    <script src="{{ asset('js/builder.js') }}"></script>

@endif

@if (Request::is('builder/manage') || Request::is('builder/create') )

    <script src="{{ asset('js/builder-manage.js') }}"></script>

@endif

@if (Request::is('account/config'))

    <script src="{{ asset('js/config.js') }}"></script>

@endif

@if (Request::is('feed'))

    <script src="{{ asset('js/vote.js') }}"></script>

@endif

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>