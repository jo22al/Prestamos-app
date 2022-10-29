<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedurSpCuotas = "CREATE PROCEDURE SP_CUOTAS(
            IN monto DOUBLE,
            IN monto_couta DOUBLE,
            IN tipo_interes VARCHAR(25),
            IN interes DOUBLE,
            IN fecha_pago DATETIME,
            IN periodicidad VARCHAR(25))
            
            BEGIN
            DECLARE capital        DOUBLE DEFAULT 0;
            DECLARE saldo          DOUBLE DEFAULT monto;
            DECLARE total_interes  DOUBLE DEFAULT 0;

            DROP TABLE IF EXISTS tmp;
            CREATE TEMPORARY TABLE tmp(
                fecha_pago DATE,
                monto_couta DOUBLE,
                interes DOUBLE,
                total_interes DOUBLE,
                capital DOUBLE,
                saldo DOUBLE
            );

            INSERT INTO tmp  (fecha_pago, monto_couta, total_interes, interes, capital, saldo)
                VALUES (fecha_pago, monto_couta, total_interes, interes,capital, saldo);

            IF tipo_interes = 'FIJO' THEN
                SET interes = interes;
            END IF;

            IF tipo_interes = 'PORCENTAJE' THEN
                SET interes = ROUND((interes /100), 2);
            END IF;

            WHILE saldo >= 0 DO

                IF periodicidad = 'M' THEN
                    SET fecha_pago = DATE_ADD(fecha_pago, INTERVAL 1 MONTH);
                END IF;

                IF periodicidad = 'S' THEN
                    SET fecha_pago = DATE_ADD(fecha_pago, INTERVAL 1 WEEK );
                END IF;

                IF periodicidad = 'Q' THEN
                    SET fecha_pago = DATE_ADD(fecha_pago, INTERVAL 2 WEEK );
                END IF;

                IF tipo_interes = 'PORCENTAJE' THEN
                    SET total_interes = ROUND((interes * saldo), 2);
                END IF;

                IF tipo_interes = 'FIJO' THEN
                    SET total_interes = interes;
                END IF;

                SET capital = ROUND((monto_couta - total_interes), 2);

                SET saldo = ROUND((saldo - capital), 2);

                INSERT INTO tmp  (fecha_pago, monto_couta, total_interes, interes, capital, saldo)
                VALUES (fecha_pago, monto_couta, total_interes, interes, capital, saldo);


            END WHILE;

            SELECT * FROM tmp;
            DROP TEMPORARY TABLE tmp;

            END";

        DB::unprepared("DROP procedure IF EXISTS SP_CUOTAS");
        DB::unprepared($procedurSpCuotas);

        $procedurSpPagos = "CREATE PROCEDURE SP_PAGOS(
            IN idPrestamo int,
            IN saldo float,
            IN fecha_PAGO date,
            IN tipo_interes varchar(25),
            IN interes double,
            IN periodicidad varchar(25),
            IN monto_couta float,
            IN mora float)
        BEGIN
        
            DECLARE capital        DOUBLE DEFAULT 0;
            DECLARE total_interes  DOUBLE DEFAULT 0;
        
        
            IF periodicidad = 'M' THEN
                SET fecha_pago = DATE_ADD(fecha_pago, INTERVAL 1 MONTH);
            END IF;
        
            IF periodicidad = 'S' THEN
                SET fecha_pago = DATE_ADD(fecha_pago, INTERVAL 1 WEEK );
            END IF;
        
            IF periodicidad = 'Q' THEN
                SET fecha_pago = DATE_ADD(fecha_pago, INTERVAL 2 WEEK );
            END IF;
        
            IF tipo_interes = 'PORCENTAJE' THEN
                SET interes = ROUND((interes /100), 2);
                SET total_interes = ROUND((interes * saldo), 2);
            END IF;
        
            IF tipo_interes = 'FIJO' THEN
                SET interes = interes;
                SET total_interes = interes;
            END IF;
        
            SET capital = ROUND(((monto_couta - total_interes) - mora), 2);
        
            SET saldo = ROUND((saldo - capital), 2);
        
        
            UPDATE prestamos
            SET saldo = saldo, fecha_pago = fecha_pago
            WHERE id = idPrestamo;
        
            SELECT saldo FROM prestamos WHERE id = idPrestamo;
        END";

        DB::unprepared("DROP procedure IF EXISTS SP_PAGOS");
        DB::unprepared($procedurSpPagos);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
