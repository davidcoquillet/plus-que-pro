<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:init-movies')->daily();