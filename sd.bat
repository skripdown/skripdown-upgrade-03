@echo off
if %1%==fresh (GOTO FRESH)
if %1%==seed (GOTO SEED)
if %1%==serve (GOTO SERVE)
:DONE
EXIT

:FRESH
start php skripdown migrate:fresh
GOTO DONE

:SEED
start php skripdown migrate:fresh --seed
GOTO DONE

:SERVE
start php skripdown serve
GOTO DONE
