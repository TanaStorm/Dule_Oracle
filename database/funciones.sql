CREATE OR REPLACE FUNCTION sumaTotal  
RETURN number IS  
   total number:= 0;  
BEGIN  
   SELECT sum(cantidad*preciounitario) into total  
   FROM temp_detallefactura;  
    RETURN total;  
END;  
-----------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION totalMonto
RETURN number IS  
   total number(2);  
begin

for c in (SELECT cantidad*preciounitario into total  
   FROM temp_detallefactura)

loop
    RETURN total;  
end loop;
END;  