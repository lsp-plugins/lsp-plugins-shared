/*
 * Copyright (C) 2020 Linux Studio Plugins Project <https://lsp-plug.in/>
 *           (C) 2020 Vladimir Sadovnikov <sadko4u@gmail.com>
 *
 * This file is part of lsp-plugins-shared
 * Created on: 25 нояб. 2020 г.
 *
 * lsp-plugins-shared is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * lsp-plugins-shared is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with lsp-plugins-shared. If not, see <https://www.gnu.org/licenses/>.
 */

#ifndef LSP_PLUG_IN_SHARED_VERSION_H_
#define LSP_PLUG_IN_SHARED_VERSION_H_

#define LSP_PLUGINS_SHARED_MAJOR        1
#define LSP_PLUGINS_SHARED_MINOR        0
#define LSP_PLUGINS_SHARED_MICRO        10

#ifdef LSP_LLTL_LIB_BUILTIN
    #define LSP_PLUGINS_SHARED_EXPORT
    #define LSP_PLUGINS_SHARED_CEXPORT
    #define LSP_PLUGINS_SHARED_IMPORT       LSP_SYMBOL_IMPORT
    #define LSP_PLUGINS_SHARED_CIMPORT      LSP_CSYMBOL_IMPORT
#else
    #define LSP_PLUGINS_SHARED_EXPORT       LSP_SYMBOL_EXPORT
    #define LSP_PLUGINS_SHARED_CEXPORT      LSP_CSYMBOL_EXPORT
    #define LSP_PLUGINS_SHARED_IMPORT       LSP_SYMBOL_IMPORT
    #define LSP_PLUGINS_SHARED_CIMPORT      LSP_CSYMBOL_IMPORT
#endif

#endif /* LSP_PLUG_IN_SHARED_VERSION_H_ */
