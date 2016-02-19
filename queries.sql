select    count(li.id)
from      caja ca, libreta li
where         ca.id = li.caja_id
          AND li.vendedor_id is not null
          AND ca.estado <> 'DESHABILITADO'
          AND li.caja_id = 13

select    count(li.id)
from      caja ca, libreta li
where         ca.id = li.caja_id
          -- AND li.vendedor_id is not null
          AND ca.estado <> 'DESHABILITADO'
          AND li.caja_id = 13
          
update caja ca set ca.libretas_asignadas = 4 where ca.id = 14

update caja ca set ca.juego_id = 2 where ca.juego_id = 20


select    count(li.id)
         -- li.*
from      caja ca, libreta li
where         ca.id = li.caja_id
          AND li.vendedor_id is null
          AND ca.estado <> 'DESHABILITADO'
          AND li.caja_id = 11
          
select   ca.numero_carton, li.*
from      caja ca, libreta li
where         ca.id = li.caja_id
          -- AND li.vendedor_id is null
          AND ca.estado <> 'DESHABILITADO'
          AND li.caja_id = 21
          
          
select ca.id, ca.numero_carton from caja ca where ca.estado <> 'DESHABILITADO' order by ca.id desc
select ca.id, ca.numero_carton, ca.estado from caja ca order by ca.id desc

-- SUM(li.precio_acumulado), SUM(li.premio_acumulado)

-- ESTE ES EL MERO MERO
select  ca.id, su.nombre as sucursal, usu.tipo_usuario, ju.nombre as juego,
        ca.numero_carton, li.correlativo, CONCAT(usu.nombre, ' ', usu.apellidos) as fullname,
        SUM(li.premio_acumulado), SUM(li.raspable_gratis_acumulado), SUM(li.precio_acumulado),
        ca.sucursal_id, ca.contiene_libreta_limite_inferior, ca.contiene_libreta_limite_superior,
        ca.omite_libreta, ca.total_libretas, ca.libretas_asignadas, ca.usuario_id,
        ca.fecha_creacion, ca.estado
from caja ca, sucursal su, juego ju, libreta li, usuario usu
where     ca.id = li.caja_id
      AND ca.sucursal_id = su.id
      AND ca.juego_id = ju.id
      AND ca.estado not in ('DESHABILITADO','ASIGNADO_A_SUPERVISOR')
      AND li.vendedor_id = usu.id
-- group by ju.nombre, usu.tipo_usuario, su.nombre
group by su.nombre, usu.tipo_usuario, ju.nombre
order by ju.nombre asc, usu.tipo_usuario asc, su.nombre asc, ca.numero_carton desc


select  ca.id, su.nombre as sucursal, usu.tipo_usuario, ju.nombre as juego,
        ca.numero_carton, li.correlativo, CONCAT(usu.nombre, ' ', usu.apellidos) as fullname, li.precio_acumulado, li.premio_acumulado,
        li.raspable_gratis_acumulado, ca.sucursal_id, ca.contiene_libreta_limite_inferior, ca.contiene_libreta_limite_superior,
        ca.omite_libreta, ca.total_libretas, ca.libretas_asignadas, ca.usuario_id,
        ca.fecha_creacion, ca.estado
from caja ca, sucursal su, juego ju, libreta li, usuario usu
where     ca.id = li.caja_id
      AND ca.sucursal_id = su.id
      AND ca.juego_id = ju.id
      AND ca.estado not in ('DESHABILITADO','ASIGNADO_A_SUPERVISOR')
      AND li.vendedor_id = usu.id
-- group by usu.tipo_usuario
order by ju.nombre asc, usu.tipo_usuario asc, su.nombre asc, ca.numero_carton desc

-- NO FUNCIONA
select  ca.id, su.nombre as sucursal, usu.tipo_usuario, ju.nombre as juego,
        ca.numero_carton, li.correlativo, CONCAT(usu.nombre, ' ', usu.apellidos) as fullname, li.precio_acumulado, li.premio_acumulado,
        li.raspable_gratis_acumulado, ca.sucursal_id, ca.contiene_libreta_limite_inferior, ca.contiene_libreta_limite_superior,
        ca.omite_libreta, ca.total_libretas, ca.libretas_asignadas, ca.usuario_id,
        ca.fecha_creacion, ca.estado
from caja as ca 
  left join libreta as li ON li.caja_id = ca.id
  left join ticket as ti ON ti.libreta_id = li.id
  left join sucursal as su ON ca.sucursal_id = su.id
  left join juego as ju ON ca.juego_id = ju.id
  left join usuario as usu ON li.vendedor_id = usu.id
where ca.estado not in ('DESHABILITADO','ASIGNADO_A_SUPERVISOR')
order by ju.nombre asc, usu.tipo_usuario asc, su.nombre asc, ca.numero_carton desc



select    ti.* -- , sum(premio)
from      ticket ti, libreta li , caja ca, sucursal su, juego ju
where     ti.libreta_id = li.id AND
          li.caja_id = ca.id AND
          ca.sucursal_id = su.id AND
          ca.juego_id = ju.id AND
          (ju.nombre = 'La gallinita de la suerte' OR ju.nombre = 'La mina de los diamantes') AND
          ti.estado = 'PREMIADO'
group by ju.nombre
order by ti.premio asc

select    ju.nombre, ti.premio, count(ti.premio), ti.* -- , sum(premio)
from      caja ca, sucursal su, juego ju, libreta li, ticket ti
where     ca.sucursal_id = su.id AND
          ca.juego_id = ju.id AND
          ca.id = li.caja_id AND
          li.id = ti.libreta_id AND 
          (ju.nombre = 'La gallinita de la suerte' OR ju.nombre = 'La mina de los diamantes') AND
          ti.estado = 'PREMIADO'
group by ju.nombre, ti.premio
order by ti.premio asc
          
          
select ti.*, count(ti.premio)
from ticket ti 
where ti.premio is not null
group by ti.premio
order by ti.premio asc
 
select ti.* from ticket ti where premio = '1' and ti.estado = 'EN_RUTA'