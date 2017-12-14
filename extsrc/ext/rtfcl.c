
/* This file was generated automatically by Zephir do not modify it! */

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <php.h>

#include "php_ext.h"
#include "rtfcl.h"

#include <ext/standard/info.h>

#include <Zend/zend_operators.h>
#include <Zend/zend_exceptions.h>
#include <Zend/zend_interfaces.h>

#include "kernel/globals.h"
#include "kernel/main.h"
#include "kernel/fcall.h"
#include "kernel/memory.h"



zend_class_entry *rtfcl_math_type_matrix_ce;

ZEND_DECLARE_MODULE_GLOBALS(rtfcl)

PHP_INI_BEGIN()
	
PHP_INI_END()

static PHP_MINIT_FUNCTION(rtfcl)
{
	REGISTER_INI_ENTRIES();
	zephir_module_init();
	ZEPHIR_INIT(RTFCL_Math_Type_Matrix);
	return SUCCESS;
}

#ifndef ZEPHIR_RELEASE
static PHP_MSHUTDOWN_FUNCTION(rtfcl)
{
	zephir_deinitialize_memory(TSRMLS_C);
	UNREGISTER_INI_ENTRIES();
	return SUCCESS;
}
#endif

/**
 * Initialize globals on each request or each thread started
 */
static void php_zephir_init_globals(zend_rtfcl_globals *rtfcl_globals TSRMLS_DC)
{
	rtfcl_globals->initialized = 0;

	/* Memory options */
	rtfcl_globals->active_memory = NULL;

	/* Virtual Symbol Tables */
	rtfcl_globals->active_symbol_table = NULL;

	/* Cache Enabled */
	rtfcl_globals->cache_enabled = 1;

	/* Recursive Lock */
	rtfcl_globals->recursive_lock = 0;

	/* Static cache */
	memset(rtfcl_globals->scache, '\0', sizeof(zephir_fcall_cache_entry*) * ZEPHIR_MAX_CACHE_SLOTS);


}

/**
 * Initialize globals only on each thread started
 */
static void php_zephir_init_module_globals(zend_rtfcl_globals *rtfcl_globals TSRMLS_DC)
{

}

static PHP_RINIT_FUNCTION(rtfcl)
{

	zend_rtfcl_globals *rtfcl_globals_ptr;
#ifdef ZTS
	tsrm_ls = ts_resource(0);
#endif
	rtfcl_globals_ptr = ZEPHIR_VGLOBAL;

	php_zephir_init_globals(rtfcl_globals_ptr TSRMLS_CC);
	zephir_initialize_memory(rtfcl_globals_ptr TSRMLS_CC);


	return SUCCESS;
}

static PHP_RSHUTDOWN_FUNCTION(rtfcl)
{
	
	zephir_deinitialize_memory(TSRMLS_C);
	return SUCCESS;
}

static PHP_MINFO_FUNCTION(rtfcl)
{
	php_info_print_box_start(0);
	php_printf("%s", PHP_RTFCL_DESCRIPTION);
	php_info_print_box_end();

	php_info_print_table_start();
	php_info_print_table_header(2, PHP_RTFCL_NAME, "enabled");
	php_info_print_table_row(2, "Author", PHP_RTFCL_AUTHOR);
	php_info_print_table_row(2, "Version", PHP_RTFCL_VERSION);
	php_info_print_table_row(2, "Build Date", __DATE__ " " __TIME__ );
	php_info_print_table_row(2, "Powered by Zephir", "Version " PHP_RTFCL_ZEPVERSION);
	php_info_print_table_end();

	DISPLAY_INI_ENTRIES();
}

static PHP_GINIT_FUNCTION(rtfcl)
{
	php_zephir_init_globals(rtfcl_globals TSRMLS_CC);
	php_zephir_init_module_globals(rtfcl_globals TSRMLS_CC);
}

static PHP_GSHUTDOWN_FUNCTION(rtfcl)
{

}


zend_function_entry php_rtfcl_functions[] = {
ZEND_FE_END

};

zend_module_entry rtfcl_module_entry = {
	STANDARD_MODULE_HEADER_EX,
	NULL,
	NULL,
	PHP_RTFCL_EXTNAME,
	php_rtfcl_functions,
	PHP_MINIT(rtfcl),
#ifndef ZEPHIR_RELEASE
	PHP_MSHUTDOWN(rtfcl),
#else
	NULL,
#endif
	PHP_RINIT(rtfcl),
	PHP_RSHUTDOWN(rtfcl),
	PHP_MINFO(rtfcl),
	PHP_RTFCL_VERSION,
	ZEND_MODULE_GLOBALS(rtfcl),
	PHP_GINIT(rtfcl),
	PHP_GSHUTDOWN(rtfcl),
	NULL,
	STANDARD_MODULE_PROPERTIES_EX
};

#ifdef COMPILE_DL_RTFCL
ZEND_GET_MODULE(rtfcl)
#endif
