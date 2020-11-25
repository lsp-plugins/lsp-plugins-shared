# Variables that describe dependencies
LSP_COMMON_LIB_VERSION     := 1.0.11
LSP_COMMON_LIB_NAME        := lsp-common-lib
LSP_COMMON_LIB_TYPE        := hdr
LSP_COMMON_LIB_URL         := https://github.com/sadko4u/$(LSP_COMMON_LIB_NAME).git

LSP_TEST_FW_VERSION        := 1.0.6
LSP_TEST_FW_NAME           := lsp-test-fw
LSP_TEST_FW_TYPE           := src
LSP_TEST_FW_URL            := https://github.com/sadko4u/$(LSP_TEST_FW_NAME).git

LSP_PLUGIN_FW_VERSION      := 0.5.0
LSP_PLUGIN_FW_NAME         := lsp-plugin-fw
LSP_PLUGIN_FW_TYPE         := hdr
LSP_PLUGIN_FW_URL          := https://github.com/sadko4u/$(LSP_PLUGIN_FW_NAME).git

ifeq ($(PLATFORM),Windows)
  STDLIB_VERSION             := system
  STDLIB_TYPE                := opt
  STDLIB_LDFLAGS             := -lpthread -lshlwapi
else
  STDLIB_VERSION             := system
  STDLIB_TYPE                := opt
  STDLIB_LDFLAGS             := -lpthread
endif
