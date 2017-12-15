
#ifdef HAVE_CONFIG_H
#include "../../../ext_config.h"
#endif

#include <php.h>
#include "../../../php_ext.h"
#include "../../../ext.h"

#include <Zend/zend_operators.h>
#include <Zend/zend_exceptions.h>
#include <Zend/zend_interfaces.h>

#include "kernel/main.h"
#include "kernel/object.h"
#include "kernel/memory.h"
#include "kernel/array.h"
#include "kernel/operators.h"
#include "kernel/fcall.h"


ZEPHIR_INIT_CLASS(RTFCL_Math_Type_Matrix) {

	ZEPHIR_REGISTER_CLASS(RTFCL\\Math\\Type, Matrix, rtfcl, math_type_matrix, rtfcl_math_type_matrix_method_entry, 0);

	zend_declare_property_null(rtfcl_math_type_matrix_ce, SL("elements"), ZEND_ACC_PRIVATE TSRMLS_CC);

	zend_declare_property_null(rtfcl_math_type_matrix_ce, SL("rows"), ZEND_ACC_PRIVATE TSRMLS_CC);

	zend_declare_property_null(rtfcl_math_type_matrix_ce, SL("cols"), ZEND_ACC_PRIVATE TSRMLS_CC);

	return SUCCESS;

}

PHP_METHOD(RTFCL_Math_Type_Matrix, __construct) {

	zval *elements_param = NULL, _0, _1;
	zval elements;
	zval *this_ptr = getThis();

	ZVAL_UNDEF(&elements);
	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &elements_param);

	zephir_get_arrval(&elements, elements_param);


	zephir_update_property_zval(this_ptr, SL("elements"), &elements);
	ZEPHIR_INIT_ZVAL_NREF(_0);
	ZVAL_LONG(&_0, zephir_fast_count_int(&elements TSRMLS_CC));
	zephir_update_property_zval(this_ptr, SL("rows"), &_0);
	zephir_array_fetch_long(&_1, &elements, 0, PH_NOISY | PH_READONLY, "rtfcl/Math/Type/Matrix.zep", 15 TSRMLS_CC);
	ZEPHIR_INIT_ZVAL_NREF(_0);
	ZVAL_LONG(&_0, zephir_fast_count_int(&_1 TSRMLS_CC));
	zephir_update_property_zval(this_ptr, SL("cols"), &_0);
	ZEPHIR_MM_RESTORE();

}

/**
 * Transpose and get new matrix
 *
 * @return Matrix
 */
PHP_METHOD(RTFCL_Math_Type_Matrix, transpose) {

	zend_bool _1, _5$$3;
	zval rowId, columnId, _0, _4$$3, _8$$4, _9$$4, _10$$4;
	zval transposedElements, transposedElementsRow$$3;
	zend_long ZEPHIR_LAST_CALL_STATUS, _2, _3, _6$$3, _7$$3;
	zval *this_ptr = getThis();

	ZVAL_UNDEF(&transposedElements);
	ZVAL_UNDEF(&transposedElementsRow$$3);
	ZVAL_UNDEF(&rowId);
	ZVAL_UNDEF(&columnId);
	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_4$$3);
	ZVAL_UNDEF(&_8$$4);
	ZVAL_UNDEF(&_9$$4);
	ZVAL_UNDEF(&_10$$4);

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(&transposedElements);
	array_init(&transposedElements);
	zephir_read_property(&_0, this_ptr, SL("cols"), PH_NOISY_CC | PH_READONLY);
	_3 = (zephir_get_numberval(&_0) - 1);
	_2 = 0;
	_1 = 0;
	if (_2 <= _3) {
		while (1) {
			if (_1) {
				_2++;
				if (!(_2 <= _3)) {
					break;
				}
			} else {
				_1 = 1;
			}
			ZEPHIR_INIT_NVAR(&columnId);
			ZVAL_LONG(&columnId, _2);
			ZEPHIR_INIT_NVAR(&transposedElementsRow$$3);
			array_init(&transposedElementsRow$$3);
			zephir_read_property(&_4$$3, this_ptr, SL("rows"), PH_NOISY_CC | PH_READONLY);
			_7$$3 = (zephir_get_numberval(&_4$$3) - 1);
			_6$$3 = 0;
			_5$$3 = 0;
			if (_6$$3 <= _7$$3) {
				while (1) {
					if (_5$$3) {
						_6$$3++;
						if (!(_6$$3 <= _7$$3)) {
							break;
						}
					} else {
						_5$$3 = 1;
					}
					ZEPHIR_INIT_NVAR(&rowId);
					ZVAL_LONG(&rowId, _6$$3);
					zephir_read_property(&_8$$4, this_ptr, SL("elements"), PH_NOISY_CC | PH_READONLY);
					zephir_array_fetch(&_9$$4, &_8$$4, &rowId, PH_NOISY | PH_READONLY, "rtfcl/Math/Type/Matrix.zep", 31 TSRMLS_CC);
					zephir_array_fetch(&_10$$4, &_9$$4, &columnId, PH_NOISY | PH_READONLY, "rtfcl/Math/Type/Matrix.zep", 31 TSRMLS_CC);
					zephir_array_update_zval(&transposedElementsRow$$3, &rowId, &_10$$4, PH_COPY | PH_SEPARATE);
				}
			}
			zephir_array_update_zval(&transposedElements, &columnId, &transposedElementsRow$$3, PH_COPY | PH_SEPARATE);
		}
	}
	object_init_ex(return_value, rtfcl_math_type_matrix_ce);
	ZEPHIR_CALL_METHOD(NULL, return_value, "__construct", NULL, 1, &transposedElements);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Transpose self
 */
PHP_METHOD(RTFCL_Math_Type_Matrix, transposeInPlace) {

	zval *this_ptr = getThis();



}

/**
 * Get array
 */
PHP_METHOD(RTFCL_Math_Type_Matrix, toArray) {

	zval *this_ptr = getThis();


	RETURN_MEMBER(getThis(), "elements");

}

