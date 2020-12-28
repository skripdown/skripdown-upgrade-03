@echo off
if %1%==fresh (GOTO FRESH)
if %1%==seed (GOTO SEED)
if %1%==serve (GOTO SERVE)
if %1%==publish (GOTO PUBLISH)
:DONE
EXIT

:FRESH
start php skripdown migrate:fresh
GOTO DONE

:SEED
start php skripdown migrate:fresh --seed
GOTO DONE

:SERVE
start /wait php skripdown migrate:fresh --seed
start php skripdown serve
GOTO DONE

:PUBLISH
start ngrok http 127.0.0.1:8000
GOTO DONE
