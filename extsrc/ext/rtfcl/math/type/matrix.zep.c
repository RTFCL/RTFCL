
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
#include "kernel/operators.h"
#include "kernel/memory.h"
#include "kernel/array.h"
#include "kernel/fcall.h"


ZEPHIR_INIT_CLASS(RTFCL_Math_Type_Matrix) {

	ZEPHIR_REGISTER_CLASS(RTFCL\\Math\\Type, Matrix, rtfcl, math_type_matrix, rtfcl_math_type_matrix_method_entry, 0);

	zend_declare_property_null(rtfcl_math_type_matrix_ce, SL("elements"), ZEND_ACC_PRIVATE TSRMLS_CC);

	return SUCCESS;

}

PHP_METHOD(RTFCL_Math_Type_Matrix, __construct) {

	zval *elements_param = NULL;
	zval elements;
	zval *this_ptr = getThis();

	ZVAL_UNDEF(&elements);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &elements_param);

	zephir_get_arrval(&elements, elements_param);


	zephir_update_property_zval(this_ptr, SL("elements"), &elements);
	ZEPHIR_MM_RESTORE();

}

PHP_METHOD(RTFCL_Math_Type_Matrix, transpose) {

	zend_string *_3, *_6$$3;
	zend_ulong _2, _5$$3;
	zval rowId, columnId, row, value, _0, *_1, *_4$$3;
	zval transposedElements;
	zend_long ZEPHIR_LAST_CALL_STATUS;
	zval *this_ptr = getThis();

	ZVAL_UNDEF(&transposedElements);
	ZVAL_UNDEF(&rowId);
	ZVAL_UNDEF(&columnId);
	ZVAL_UNDEF(&row);
	ZVAL_UNDEF(&value);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(&transposedElements);
	array_init(&transposedElements);
	zephir_read_property(&_0, this_ptr, SL("elements"), PH_NOISY_CC | PH_READONLY);
	zephir_is_iterable(&_0, 0, "rtfcl/Math/Type/Matrix.zep", 25);
	ZEND_HASH_FOREACH_KEY_VAL(Z_ARRVAL_P(&_0), _2, _3, _1)
	{
		ZEPHIR_INIT_NVAR(&rowId);
		if (_3 != NULL) { 
			ZVAL_STR_COPY(&rowId, _3);
		} else {
			ZVAL_LONG(&rowId, _2);
		}
		ZEPHIR_INIT_NVAR(&row);
		ZVAL_COPY(&row, _1);
		zephir_is_iterable(&row, 0, "rtfcl/Math/Type/Matrix.zep", 23);
		ZEND_HASH_FOREACH_KEY_VAL(Z_ARRVAL_P(&row), _5$$3, _6$$3, _4$$3)
		{
			ZEPHIR_INIT_NVAR(&columnId);
			if (_6$$3 != NULL) { 
				ZVAL_STR_COPY(&columnId, _6$$3);
			} else {
				ZVAL_LONG(&columnId, _5$$3);
			}
			ZEPHIR_INIT_NVAR(&value);
			ZVAL_COPY(&value, _4$$3);
			zephir_array_update_multi(&transposedElements, &value TSRMLS_CC, SL("zz"), 2, &columnId, &rowId);
		} ZEND_HASH_FOREACH_END();
		ZEPHIR_INIT_NVAR(&value);
		ZEPHIR_INIT_NVAR(&columnId);
	} ZEND_HASH_FOREACH_END();
	ZEPHIR_INIT_NVAR(&row);
	ZEPHIR_INIT_NVAR(&rowId);
	object_init_ex(return_value, rtfcl_math_type_matrix_ce);
	ZEPHIR_CALL_METHOD(NULL, return_value, "__construct", NULL, 1, &transposedElements);
	zephir_check_call_status();
	RETURN_MM();

}

