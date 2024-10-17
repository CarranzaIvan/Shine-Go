#!/bin/bash

host="$1"
port="$2"
shift 2
cmd="$@"

until nc -z "$host" "$port"; do
  >&2 echo "MySQL no está listo en $host:$port. Esperando..."
  sleep 1
done

>&2 echo "MySQL está listo en $host:$port. Ejecutando comando..."
exec $cmd
